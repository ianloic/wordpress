-- Here's a MySQL script for converting Drupal posts into WordPress posts.
-- The idea is based on work at: http://www.rufuspollock.org/archives/62
-- but updated for my Drupal 5 and WordPress 2.3 installs.

-- Essentially it works by loading a few of Drupal's tables into the WordPress
-- database and converting them over into WordPress' schema. It will overwrite 
-- your existing WordPress data. This script almost certainly requires 
-- tweaking for each specific install.

-- We need to import the following Drupal tables into the WordPress DB:
--   term_data, node, node_revisions, term_node, comments, term_heirarchy, 
--   node_comment_statistics, url_alias
-- You can do it like this:
--   mysqldump --user=DRUPAL_USER --password=DRUPAL_PASS --host=DRUPAL_HOST \
--     DRUPAL_DB term_data term_hierarchy node node_revisions term_node \
--     comments node_comment_statistics url_alias | mysql --user=WP_USER \
--     --password=WP_PASS --host=WP_HOST WP_DB


-- First, we'll remove the data from all the WordPress tables we'll be chaning
-- Since we're going to use the IDs from the Drupal DB we can't leave any old
-- WordPress data around
DELETE FROM wp_posts ;
DELETE FROM wp_comments ;
DELETE FROM wp_terms;
DELETE FROM wp_term_taxonomy;
DELETE FROM wp_term_relationships;

-- Next we migrate posts over from Drupal, including url aliases and comment
-- counts
REPLACE INTO wp_posts (id, post_author, post_date, post_content, post_title, 
                      post_excerpt, post_name, post_modified, comment_count,
                      post_status)
  SELECT node.nid, 1, FROM_UNIXTIME(node.created), node_revisions.body, 
         node_revisions.title, node_revisions.teaser, url_alias.dst,
         FROM_UNIXTIME(node.changed), node_comment_statistics.comment_count,
         ELT(node.status+1, "draft", "publish")
    FROM node
    LEFT JOIN node_revisions ON node.nid=node_revisions.nid AND 
                                node.vid=node_revisions.vid
    LEFT JOIN node_comment_statistics ON node.nid=node_comment_statistics.nid
    LEFT OUTER JOIN url_alias ON url_alias.src=concat('node/',node.nid) AND
                                 url_alias.dst NOT LIKE ('%/%')
    WHERE node.type='story';

-- Then the comments themselves
INSERT INTO wp_comments (comment_post_ID, comment_date, comment_author, 
                         comment_author_email, comment_author_url, 
                         comment_author_ip, comment_content, comment_parent)
  SELECT nid, FROM_UNIXTIME(timestamp), name, mail, homepage, hostname, 
         concat(subject,' ', comment), thread
  FROM comments;


-- And finally taxonomy terms
INSERT INTO wp_terms (term_id, name, slug)
  SELECT tid, name, name FROM term_data;

-- If you'd rather use WordPress categories, switch 'post_tag' to 'category'
INSERT INTO wp_term_taxonomy (term_taxonomy_id, term_id, taxonomy, 
            description, parent)
  SELECT term_data.tid, term_data.tid, 'post_tag', term_data.description, 
         term_hierarchy.parent 
    FROM term_data, term_hierarchy 
    WHERE term_data.tid=term_hierarchy.tid;

INSERT INTO wp_term_relationships (object_id, term_taxonomy_id)
  SELECT nid, tid FROM term_node;

-- Oh, but let's get rid of those Drupal tables we imported - we don't 
-- need them anymore.
DROP TABLE term_data;
DROP TABLE term_hierarchy;
DROP TABLE node;
DROP TABLE node_revisions;
DROP TABLE term_node;
DROP TABLE comments;
DROP TABLE node_comment_statistics;
DROP TABLE url_alias;

-- PS: all posts will be assigned to the default user
