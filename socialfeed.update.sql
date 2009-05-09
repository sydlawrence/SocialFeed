DROP TABLE IF EXISTS `zest_profiles`;
CREATE TABLE `zest_profiles` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `title` text,
  `url` text,
  `favicon` text,
  fl_active int,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

alter table zest_external_feeds add fl_active int;