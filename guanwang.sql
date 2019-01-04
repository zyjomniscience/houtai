# Host: localhost  (Version 5.5.53)
# Date: 2019-01-04 18:55:36
# Generator: MySQL-Front 6.1  (Build 1.26)


#
# Structure for table "admin"
#

CREATE TABLE `admin` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `shenfen` varchar(255) DEFAULT NULL COMMENT '身份',
  `nickname` varchar(255) DEFAULT NULL COMMENT '昵称',
  `password` varchar(255) DEFAULT NULL COMMENT '密码',
  `miaoshu` varchar(255) DEFAULT NULL COMMENT '描述',
  `permission` text NOT NULL COMMENT '权限',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='管理员表';

#
# Data for table "admin"
#

INSERT INTO `admin` VALUES (4,'超级管理员','admin','96e79218965eb72c92a549dd5a330112','拥有至高无上的权利','');

#
# Structure for table "admission_info"
#

CREATE TABLE `admission_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL COMMENT '文章标题',
  `content` text COMMENT '内容',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='招生信息表';

#
# Data for table "admission_info"
#

INSERT INTO `admission_info` VALUES (2,'1234','<div style=\"text-align: center;\">13241234132</div>',1545633613),(12,'321','<div style=\"text-align: center;\">32都发多少</div>',1545729942),(13,'4534532','423215',1545730502);

#
# Structure for table "admission_pic"
#

CREATE TABLE `admission_pic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) unsigned DEFAULT NULL COMMENT 'info的id',
  `img` varchar(255) DEFAULT NULL,
  `order` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='招生信息图片';

#
# Data for table "admission_pic"
#


#
# Structure for table "banner"
#

CREATE TABLE `banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order` tinyint(3) unsigned DEFAULT '0',
  `type` tinyint(3) unsigned DEFAULT '0' COMMENT '0.是Banner1.学校风景',
  `img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT COMMENT='banner管理表';

#
# Data for table "banner"
#


#
# Structure for table "cj_city"
#

CREATE TABLE `cj_city` (
  `id` int(10) unsigned NOT NULL COMMENT '唯一id',
  `city_name` varchar(30) NOT NULL COMMENT '地区名',
  `pinyin` varchar(200) DEFAULT NULL COMMENT '唯一。地区名拼音',
  `status` tinyint(2) NOT NULL DEFAULT '1' COMMENT '状态1使用，2禁用'
) ENGINE=MyISAM AUTO_INCREMENT=3542 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='系统地区设置';

#
# Data for table "cj_city"
#

INSERT INTO `cj_city` VALUES (9,'北京','beijing',1),(10,'天津','tianjin',1),(11,'河北','hebei',1),(12,'山西','shanxi',1),(13,'内蒙古自治区','neimenggu',1),(14,'辽宁','liaoning',1),(15,'吉林','jilin',1),(16,'黑龙江','heilongjiang',1),(17,'上海','shanghai',1),(18,'江苏','jiangsu',1),(19,'浙江','zhejiang',1),(20,'安徽','anhui',1),(21,'福建','fujian',1),(22,'江西','jiangxi',1),(23,'山东','shandong',1),(24,'河南','henan',1),(25,'湖北','hubei',1),(26,'湖南','hunan',1),(27,'广东','guangdong',1),(28,'广西壮族自治区','guangxizhuangzu',1),(29,'海南','hainan',1),(30,'重庆','Zhongqing',1),(31,'四川','sichuan',1),(32,'贵州','guizhou',1),(33,'云南','yunnan',1),(34,'西藏自治区','xicang',1),(35,'陕西','shanxi',1),(36,'甘肃','gansu',1),(37,'青海','qinghai',1),(38,'宁夏回族自治区','ningxiahuizu',1),(39,'新疆维吾尔自治区','xinjiangweiwuer',1),(40,'台湾','taiwan',1),(41,'香港特别行政区','xianggang',1),(42,'澳门特别行政区','aomen',1);

#
# Structure for table "cj_pscore"
#

CREATE TABLE `cj_pscore` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '专业名称',
  `year` varchar(30) NOT NULL DEFAULT '' COMMENT '年份',
  `batch` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '批次',
  `provice_score` decimal(10,2) unsigned DEFAULT '0.00' COMMENT '省控线',
  `avscore` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '平均分',
  `max` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '最高分',
  `min` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '最低分',
  `pid` int(11) unsigned DEFAULT NULL COMMENT '城市id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='专业历年分数';

#
# Data for table "cj_pscore"
#

INSERT INTO `cj_pscore` VALUES (1,'市场营销','2017',2,0.00,0.00,468.00,465.00,9),(5,'人力资源管理','2017',2,0.00,0.00,472.00,465.00,9);

#
# Structure for table "cj_score"
#

CREATE TABLE `cj_score` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) unsigned DEFAULT '0' COMMENT '省份',
  `type` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '0文1理2艺',
  `batch` tinyint(3) unsigned DEFAULT NULL COMMENT '批次，0本科提前批，1本科一批，2本科二批，3专科一批，4专科二批',
  `provice_score` varchar(255) NOT NULL DEFAULT '0' COMMENT '省控线',
  `min` varchar(50) DEFAULT NULL COMMENT '最低分',
  `year` varchar(30) DEFAULT NULL COMMENT '年份',
  `remarks` varchar(100) DEFAULT NULL COMMENT '备注',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='历年分数';

#
# Data for table "cj_score"
#

INSERT INTO `cj_score` VALUES (2,9,0,1,'1','1','1','1'),(3,9,0,0,'3','4','5','6');

#
# Structure for table "famous"
#

CREATE TABLE `famous` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT '' COMMENT '职务',
  `describe` text COMMENT '介绍',
  `img` varchar(255) DEFAULT NULL COMMENT '照片',
  `job` varchar(50) NOT NULL DEFAULT '' COMMENT '职称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='学校名人';

#
# Data for table "famous"
#

INSERT INTO `famous` VALUES (4,'张伟林','院长','      安徽省力学学会副理事长，安徽省城市科学研究会副会长，安徽省建筑产业现代化专家委员会副主任，安徽省装配式建筑产业联盟监事会主席。\r\n近年来，主持国家科技支撑计划课题、安徽省重点科研项目、安徽省高校重点课题等科研课题11项，地方政府委托课题10项。\r\n长期从事结构工程和建筑节能研究。主持的“叠合板式剪力墙结构抗震设计关键技术”获安徽省科学技术二等奖、另有两项科研项目获安徽省科学技术三等奖；获安徽省教学成果一等奖、二等奖各1项；安徽省自然科学三等奖1项；出版专著和省级规划教材8部，发表学术论文68篇；获得发明与实用新型专利30项。','20181221\\d39e953e7feffa7eead3be38e2ccf903.jpg','院长'),(5,'冯卫','名师','   冯卫，男，汉族，中共党员，1960年10月出生，江苏省常熟人。1983年7月毕业于合肥工业大学建筑学专业，1997年中国科技大学MBA，2012年于清华大学建筑与土木工程研究生课程班进修；正高级工程师、国家一级注册建筑师、首届安徽工程勘察设计大师、全省优秀勘察设计院长、安徽省建设技术支持先进个人荣誉称号；中国勘察设计协会建筑分会常务理事、评优专家，安徽省照明学会秘书长、合肥市城市规划学会常务理事、土木建筑学会理事长，合肥市政协委员。\r\n曾担任长春机械部第九设计研究院团委副书记，合肥国家高新技术产业开发区城建设计院院长，合肥市建筑设计研究院院长，安徽省综合交通研究院院长。主持和参与过武汉工学院七五规划、哈尔滨电工学院、安徽饭店、合肥国家动漫产业发展基地、滁州师范学院图书楼、合肥琥珀山庄、安徽建工学院新区主教学楼、新站购物中心、香樟雅苑会所、绿城合肥新绿园小区、合肥国家大学科技园、八中新校区、合肥和昌都汇华府小区等规划及建筑设计。\r\n《工程与建设》编委，安徽省工程勘察设计单位诚信评估专家委员会委员、安徽省合肥学院客座教授、安徽省绿色建筑评价标识专家。合肥工业大学客座教授，安徽建筑大学客座教授、副教授、硕士生导师，中国科学技术大学专业博士校外指导教师，安徽建筑大学城市建设学院副院长兼建筑与艺术系主任。\r\n科研成果\r\n琥珀山庄居住区[全国住宅实验小区规划,建筑设计] [主要设计人]\r\n“琥珀山庄居住区”获1993年度安徽省优秀城市规划设计一等奖','20181221\\ff69446a5b68b41e68c9083f16f222bd.jpg','副院长兼系主任');

#
# Structure for table "question"
#

CREATE TABLE `question` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '问题',
  `content` text NOT NULL COMMENT '内容',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0',
  `update_time` int(11) unsigned DEFAULT '0',
  `order` tinyint(3) unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='问题表';

#
# Data for table "question"
#


#
# Structure for table "s_liuyan"
#

CREATE TABLE `s_liuyan` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telphone` varchar(255) DEFAULT NULL,
  `province` varchar(50) DEFAULT NULL COMMENT '省份',
  `type` int(5) unsigned NOT NULL DEFAULT '0' COMMENT '科类',
  `content` text NOT NULL COMMENT '留言内容',
  `create_time` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Data for table "s_liuyan"
#

INSERT INTO `s_liuyan` VALUES (1,'zyj','zyj@qq.com','185119304','安徽',1,'撒我是非常稳地方\t',NULL);

#
# Structure for table "school_info"
#

CREATE TABLE `school_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '学校名字',
  `jianxiaotime` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '建校时间',
  `school_level` varchar(50) NOT NULL DEFAULT '' COMMENT '学校层次',
  `school_character` varchar(60) DEFAULT '' COMMENT '院校性质',
  `school_type` varchar(40) NOT NULL DEFAULT '' COMMENT '院校类型',
  `address` varchar(255) NOT NULL DEFAULT '' COMMENT '院校地址',
  `mobile` varchar(80) NOT NULL DEFAULT '' COMMENT '招生电话',
  `school_describe` text NOT NULL COMMENT '学校概况',
  `subject_describe` text NOT NULL COMMENT '学科建设',
  `teacher_describe` text NOT NULL COMMENT '师资力量',
  `admission_rules` text NOT NULL COMMENT '录取规则',
  `scholarship_policy` text NOT NULL COMMENT '奖助政策',
  `vr` varchar(255) NOT NULL DEFAULT '' COMMENT '漫校园地址',
  `logo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='学校资料';

#
# Data for table "school_info"
#

INSERT INTO `school_info` VALUES (1,'安徽建筑大学城市建设学院',2003,'本科院校','独立学院','综合','安徽合肥','0551-88569188','安徽建筑大学城市建设学院是教育部2003年批准成立的本科层次全曰制独立学院（批准文号：教发函{2003}541号）。学院新校区位于“大湖名城”一 合肥市黄麓科教园区，环巢湖旅游景观大道旁，规划占地面积630亩。校园内典型的徽派建筑与小桥流水融为一体，校园外天高云淡与碧波荡漾交相呼应。 学院荣获“合肥市文明单位”。\r\n学院设有土木工程系、建筑与艺术系、机械与电气工程系、管理工程系以及基础部等四系一部共27个本科专业，涵盖工、管、艺三大学科门类。现有 全曰制本科在校生6000余人，教职工300余人。其中，具有副高级以上专业技术职称的占36.5%、硕士及以上学位教师占92.6%，拥有省级教学名师3人， 省学术与技术带头人10余人。\r\n学院现有结构实验室、环境工程实验室、土力学实验室、建筑模型实验室、建筑材料实验室、测试实验室、电路实验室、数模电实验室、信号系统实验室、 金工实验室、材料力学实验室、工程热力学实验室、大学物理实验室、暖通空调实验室、EDA技术实验室、智能建筑实验室等48个教学实验室。图书馆纸 质图书与电子图书180万册。','学院以“土建”类学科为办学特色，以培养高级应用型人才为目标，面向市场，独立办学，突出特色，注重质量。遵循“以人为本”的教育思想，实施“名师”、“优师”工程，坚持“以培养学生为根本”，把教书育人、管理育人、服务育人落实到学院的各项工作之中。学生在全国大学生金融精英挑战赛、大学生金融虚拟仿真投资大赛、“挑战杯”大赛、大学生职业规划设计大赛、大学生校园文学原创新星大赛等比赛中荣获众多表彰和奖励。','学院设有土木工程系、建筑与艺术系、机械与电气工程系、管理工程系以及基础部等四系一部共22个本科专业，涵盖工、管、艺三大学科门类。现有全日制本科在校生5000余人，教职工300余人。其中，具有副高级以上专业技术职称的占36.5%、硕士及以上学位教师占92.6%，拥有省级教学名师3人，省学术与技术带头人10余人。','1、 基本原则：公平竞争、公正选拔、公开程序，德智体美等方面全面考核、综合评价、择优录取。\r\n2、 录取工作将按教育部及各省（市、自治区）招生委员会有关政策及规定实施。\r\n3、 各类专业的体检标准将严格执行《普通高等学校招生体检工作指导意见》（教学[2003]3号文件）。\r\n4、 在未实行平行志愿投档录取的省市，优先录取第一志愿填报我院的考生，在第一志愿录取未满额的情况下，接收非第一志愿的考生。进档考生按“分数优先，遵循志愿”的原则安排专业（对有特殊规定的省（市、自治区）按在该省公布的原则安排专业）。\r\n5、 凡报考建筑学、城乡规划、风景园林三个专业的考生，宜具有一定的美术基础，且色弱色盲者不予录取。报考无机非金属材料工程专业的考生，色盲 者不予录取。','根据财政部、教育部相关文件政策精神，安徽建筑大学城市建设学院施行国家奖学金、国家励志奖学金、国家助学金、学院奖学金、国家助学贷款、勤工助学和特困生补助等奖励或资助，并设有绿色通道。\r\n国家奖学金：由国家拨款对各高校综合表现特别优秀的学生实施奖励。\r\n国家励志奖学金：由国家拨款对各高校品学兼优且家庭经济较为困难的学生实施奖励。\r\n国家助学金：由国家拨款对品学兼优且家庭经济特别困难的学生实施资助。','https://720yun.com/t/6llmr7r8xefelpdx0j?from=groupmessage&isappinstalled=0&pano_id=1eYtr5VJjJOwH7tj&moduleId=64','20181221\\f4c4d2a9a14282705c21f98ef739ad34.jpg');

#
# Structure for table "t_liuyan"
#

CREATE TABLE `t_liuyan` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `linkman` varchar(50) DEFAULT NULL COMMENT '联系人',
  `mobile` varchar(255) DEFAULT NULL COMMENT '联系方式',
  `time` varchar(255) DEFAULT NULL COMMENT '工作时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Data for table "t_liuyan"
#

INSERT INTO `t_liuyan` VALUES (1,'招生老师','0551-88569188','周一到周五  9:00~11:45  13:00~17:00 ');

#
# Structure for table "user"
#

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `openid` varchar(50) NOT NULL,
  `nickname` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `openid` (`openid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

#
# Data for table "user"
#


#
# Structure for table "user_address"
#

CREATE TABLE `user_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL COMMENT '收获人姓名',
  `mobile` varchar(20) NOT NULL COMMENT '手机号',
  `province` varchar(20) DEFAULT NULL COMMENT '省',
  `city` varchar(20) DEFAULT NULL COMMENT '市',
  `country` varchar(20) DEFAULT NULL COMMENT '区',
  `detail` varchar(100) DEFAULT NULL COMMENT '详细地址',
  `delete_time` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL COMMENT '外键',
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

#
# Data for table "user_address"
#


#
# Structure for table "video"
#

CREATE TABLE `video` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL COMMENT '影片名称',
  `img` varchar(255) NOT NULL COMMENT '封面图url',
  `url` varchar(255) NOT NULL COMMENT '影片url',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
  `order` int(3) unsigned DEFAULT NULL,
  `content` text COMMENT '视频内容',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

#
# Data for table "video"
#


#
# Structure for table "yz_department"
#

CREATE TABLE `yz_department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department` varchar(255) DEFAULT NULL COMMENT '院系',
  `decontent` text NOT NULL COMMENT '院系详情',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='院系和专业';

#
# Data for table "yz_department"
#


#
# Structure for table "yz_profession"
#

CREATE TABLE `yz_profession` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) unsigned DEFAULT '0' COMMENT '关联院系表的',
  `pcontent` text NOT NULL COMMENT '专业内容',
  `type` varchar(40) NOT NULL DEFAULT '' COMMENT '类型',
  `xuezhi` varchar(50) NOT NULL DEFAULT '' COMMENT '学制',
  `lemu` varchar(255) NOT NULL DEFAULT '' COMMENT '科目',
  `fangxiang` varchar(255) DEFAULT NULL COMMENT '方向',
  `code` varchar(255) DEFAULT NULL COMMENT '专业代码',
  `degree` varchar(20) NOT NULL DEFAULT '' COMMENT '学位',
  `correlation` varchar(255) DEFAULT NULL COMMENT '相关专业',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='专业表';

#
# Data for table "yz_profession"
#

