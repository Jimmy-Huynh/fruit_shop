/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     8/4/2017 12:04:34 PM                         */
/*==============================================================*/


drop table if exists BILLS;

drop table if exists CATEGORYS;

drop table if exists PRODUCTS;

drop table if exists USERS;

/*==============================================================*/
/* Table: BILLS                                                 */
/*==============================================================*/
create table BILLS
(
   ID                   int not null auto_increment,
   USERID               int,
   PRODUCTID            int,
   QUANTITY             int,
   CREATEDDATE          datetime,
   primary key (ID)
);

/*==============================================================*/
/* Table: CATEGORYS                                             */
/*==============================================================*/
create table CATEGORYS
(
   ID                   int not null auto_increment,
   NAME                 varchar(200),
   primary key (ID)
);

/*==============================================================*/
/* Table: PRODUCTS                                              */
/*==============================================================*/
create table PRODUCTS
(
   ID                   int not null auto_increment,
   CATEGORYID           int,
   NAME                 varchar(200),
   IMAGE                varchar(200),
   PRICE                decimal,
   REVIEW               int,
   DESCRIPTION          text,
   VOTE                 text,
   primary key (ID)
);

/*==============================================================*/
/* Table: USERS                                                 */
/*==============================================================*/
create table USERS
(
   ID                   int not null auto_increment,
   ACCOUNT              char(50),
   PASSWORD             varchar(200),
   NAME                 varchar(200),
   ADDRESS              text,
   primary key (ID)
);

alter table BILLS add constraint FK_BILLPRODUCT foreign key (PRODUCTID)
      references PRODUCTS (ID);

alter table BILLS add constraint FK_USERBILL foreign key (USERID)
      references USERS (ID);

alter table PRODUCTS add constraint FK_PRODUCTCATEGORY foreign key (CATEGORYID)
      references CATEGORYS (ID);

