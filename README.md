# tCloud
Open source secure file storage system

## Note
This project is intended for use in an internal network.
We do not recommend disclosing it outside your company.

## What is tCloud Next?
tCloud Next is a more secure tCloud.

Therefore, we are currently updating only tCloud Next.

tCloud Next is managed differently, so

Please note that migrating from tCloud is difficult.

# Setup tCloud Next
The database and PHP server should be on the same computer and accessible via localhost.

## Create 'tCloud' DB

```sql

create database tCloud;

```

## Select 'tCloud' DB

```sql

use tCloud;

```

## Setup 'tCloud' DB

```sql
drop table IF EXISTS user_project_map;
drop table IF EXISTS project;
drop table IF EXISTS user;

-- プロジェクト名と説明がたくさんあるよ
-- * RestoreFromTempTable
create table project (
  name char(15) not null comment 'プロジェクト名'
  , detail text comment 'プロジェクト詳細'
  , constraint project_PKC primary key (name)
) comment 'プロジェクト名と説明がたくさんあるよ' ;

-- ユーザーのID、パスワードを管理する。ownerかどうかもわかる。
-- * RestoreFromTempTable
create table user (
  username char(10) not null comment 'ユーザー名'
  , password TEXT not null comment 'パスワード'
  , isowner int default 0 not null comment 'オーナーかどうか。１ならオーナー。'
  , constraint user_PKC primary key (username)
) comment 'ユーザーのID、パスワードを管理する。ownerかどうかもわかる。' ;

-- UserとProjectの紐づけを行います。
-- * RestoreFromTempTable
create table user_project_map (
  username char(10) not null comment 'アクセス権がある人'
  , projectname char(15) not null comment 'アクセスできるプロジェクト'
  , constraint user_project_map_PKC primary key (username,projectname)
) comment 'UserとProjectの紐づけを行います。' ;

alter table user_project_map
  add constraint user_project_map_FK1 foreign key (projectname) references project(name)
  on delete cascade
  on update cascade;

alter table user_project_map
  add constraint user_project_map_FK2 foreign key (username) references user(username)
  on delete cascade
  on update cascade;
```

## Setting tCloud Next
Configure the database connection information in tCloud Next.

1. Open db.php
2. Change database connection information

# Reset tCloud Next

## Run SQL

If you want to reset your account information, first execute the following SQL statement.

```sql
use tCloud;

drop table IF EXISTS user_project_map;
drop table IF EXISTS project;
drop table IF EXISTS user;

-- プロジェクト名と説明がたくさんあるよ
-- * RestoreFromTempTable
create table project (
  name char(15) not null comment 'プロジェクト名'
  , detail text comment 'プロジェクト詳細'
  , constraint project_PKC primary key (name)
) comment 'プロジェクト名と説明がたくさんあるよ' ;

-- ユーザーのID、パスワードを管理する。ownerかどうかもわかる。
-- * RestoreFromTempTable
create table user (
  username char(10) not null comment 'ユーザー名'
  , password TEXT not null comment 'パスワード'
  , isowner int default 0 not null comment 'オーナーかどうか。１ならオーナー。'
  , constraint user_PKC primary key (username)
) comment 'ユーザーのID、パスワードを管理する。ownerかどうかもわかる。' ;

-- UserとProjectの紐づけを行います。
-- * RestoreFromTempTable
create table user_project_map (
  username char(10) not null comment 'アクセス権がある人'
  , projectname char(15) not null comment 'アクセスできるプロジェクト'
  , constraint user_project_map_PKC primary key (username,projectname)
) comment 'UserとProjectの紐づけを行います。' ;

alter table user_project_map
  add constraint user_project_map_FK1 foreign key (projectname) references project(name)
  on delete cascade
  on update cascade;

alter table user_project_map
  add constraint user_project_map_FK2 foreign key (username) references user(username)
  on delete cascade
  on update cascade;
```

## Delete or Move Folder

Then, delete or move the folders associated with your account.

# Add member in tCloud Next
If you have tCloud Next "owner" permissions, you can add members.

1. First, access the server where tCloud Next is running via http.
2. Log in. If you are not logged in, the screen will be displayed automatically.
3. Access the owner folder on your browser.
4. Add member.

# Delete member in tCloud Next
This feature is not implemented.

# Migration from tCloud to tCloud Next

1. First, move the files you have already uploaded to another location.
2. Download the latest version of tCloud Next.
3. Set up. How to do this is written in Setup tCloud Next.
4. Add members. This is written in Add member in tCloud Next.
5. Move or copy the files you previously uploaded using tCloud to the automatically generated folder.
