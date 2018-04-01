/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  Lin
 * Created: 2017-11-18
 */

--修改数据表结构
ALTER TABLE news MODIFY create_time int(10) NOT NULL;

--新建商品表
CREATE TABLE goods(
  id INT(10) NOT NULL AUTO_INCREMENT,
  goods_name CHAR(38) NOT NULL,
  goods_price FlOAT(20) NOT NULL,
  goods_picture VARCHAR(1000),
  goods_attr VARCHAR(100),
  goods_detail TEXT,
  PRIMARY KEY(id)
)engine=InnoDB CHARSET='utf8';

--修改商品表（新增字段）
ALTER TABLE goods ADD type_id INT(6) DEFAULT 0 AFTER goods_name;--分类id
ALTER TABLE goods ADD goods_brand CHAR(28);--商品品牌
ALTER TABLE goods ADD create_time INT(11);--上市时间

--新建商品分类表
CREATE TABLE goods_type(
  id TINYINT(3) NOT NULL AUTO_INCREMENT,
  type_name CHAR(30) NOT NULL,
  pid TINYINT(3) DEFAULT 0,
  PRIMARY KEY (id)
)engine=InnoDB CHARSET="utf8";