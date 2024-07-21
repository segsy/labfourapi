create table failed_jobs
(
    id         bigint unsigned auto_increment
        primary key,
    uuid       varchar(255)                        not null,
    connection text                                not null,
    queue      text                                not null,
    payload    longtext                            not null,
    exception  longtext                            not null,
    failed_at  timestamp default CURRENT_TIMESTAMP not null,
    constraint failed_jobs_uuid_unique
        unique (uuid)
)
    collate = utf8mb4_unicode_ci;

create table migrations
(
    id        int unsigned auto_increment
        primary key,
    migration varchar(255) not null,
    batch     int          not null
)
    collate = utf8mb4_unicode_ci;

create table password_resets
(
    email      varchar(255) not null,
    token      varchar(255) not null,
    created_at timestamp    null
)
    collate = utf8mb4_unicode_ci;

create index password_resets_email_index
    on password_resets (email);

create table personal_access_tokens
(
    id             bigint unsigned auto_increment
        primary key,
    tokenable_type varchar(255)    not null,
    tokenable_id   bigint unsigned not null,
    name           varchar(255)    not null,
    token          varchar(64)     not null,
    abilities      text            null,
    last_used_at   timestamp       null,
    expires_at     timestamp       null,
    created_at     timestamp       null,
    updated_at     timestamp       null,
    constraint personal_access_tokens_token_unique
        unique (token)
)
    collate = utf8mb4_unicode_ci;

create index personal_access_tokens_tokenable_type_tokenable_id_index
    on personal_access_tokens (tokenable_type, tokenable_id);

create table users
(
    id                bigint unsigned auto_increment
        primary key,
    name              varchar(255) not null,
    email             varchar(255) not null,
    email_verified_at timestamp    null,
    password          varchar(255) not null,
    remember_token    varchar(100) null,
    created_at        timestamp    null,
    updated_at        timestamp    null,
    constraint users_email_unique
        unique (email)
)
    collate = utf8mb4_unicode_ci;


insert into migrations (id, migration, batch)
values  (1, '2014_10_12_000000_create_users_table', 1),
        (2, '2014_10_12_100000_create_password_resets_table', 1),
        (3, '2019_08_19_000000_create_failed_jobs_table', 1),
        (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);
        (5, '2023_11_28_062513_create_blogs_table', 1),
        (6, '2024_07_19_132044_create_books_table', 1),
        (7, '2024_07_19_132129_create_authors_table', 1);

insert into users (id, name, email, email_verified_at, password, remember_token, created_at, updated_at)
values  (1, 'test user', 'test@test.com', null, '$2y$10$bXcKxcdPExJR/29r1rZJk.7S8KKwr8Ri.uuN9TirPvB2TLeWQrliq', null, '2022-10-23 20:34:28', '2022-10-23 20:34:28'),
        (2, 'dummy user', 'dummy@user.com', null, 'this-will-not-work', null, '2022-10-23 20:35:25', '2022-10-23 20:35:25');
        (3, 'Segun Aruleba', 'forexaccuray@gmail.com', NULL, '$2y$12$4LI2ofLhgPdK5qLXCSyupeKq.BOq9RHNS7fvASC4V0djXo5NN1O4u', NULL, '2024-07-21 10:57:18', '2024-07-21 10:57:18');


        INSERT INTO authors (id, author_name, created_at, updated_at, deleted_at) 
        VALUES (1, 'Wole Shoyinka', '2024-07-21 11:21:10', '2024-07-21 11:21:10', NULL),
(2, 'Chinua Achebe', '2024-07-21 11:22:04', '2024-07-21 11:22:04', NULL),
(3, 'Chimamanda Ngozi Adichie', '2024-07-21 11:23:26', '2024-07-21 11:23:26', NULL),
(4, 'Ben Okri', '2024-07-21 11:23:52', '2024-07-21 11:23:52', NULL),
(5, 'Chika Unigwe', '2024-07-21 11:24:18', '2024-07-21 11:24:18', NULL);

INSERT INTO books (id, title, description, author_id, created_at, updated_at, deleted_at) 
VALUES (1, 'Self-Publishing on KDP the Write Way--How to Publish on Amazon and Rank Well', 'Be a successful author! You\'ve written a magnum opus in the form of your first book. Now what?\nAre you overwhelmed with all the advice and resources out there on self-publishing? It can be very scary when you don\'t know what you need to know. Even if you only write because you have a burning passion to create, once you publish a book, you want people to read it. To get readers, you must get sales. And this book will tell you how to rank the best you can to make sales and why that\'s important. *This text includes changes Amazon KDP has made up to May 2024.\n\nIf you want to self-publish, you need this book. It is the secret you\'ve been looking for that will show you the 20% effort that gets 80% results--because no one clicks on a book they don\'t see. This is not a get-rich-quick scheme. It is for authors who want to stay relevant to Amazon\'s algorithms and continue to sell books over time.', 1, '2024-07-21 11:02:13', '2024-07-21 11:02:13', NULL),
(2, 'The Author\'s Guide to Marketing Books on Amazon (The Author\'s Guides Series) Paperback – November 5, 2018', 'Updated for 2024! Read the insider’s guide to sell more books on Amazon and learn how to buy effective ads, master your marketing copy, get more customer reviews, and even use Amazon to build your author email list.\n\n“I recommend Rob Eagar to any author looking to take their book campaign to a higher level.” – Dr. Gary Chapman, New York Times bestselling author of The 5 Love Languages\n\n“Rob Eagar’s expertise was beyond my expectations…” – Wanda Brunstetter, 6-time New York Times bestselling novelist with over 10 million copies sold\n\nRob Eagar is one of the most accomplished book marketing experts in America. He has coached over 1,000 authors and helped both fiction and nonfiction books hit The New York Times bestseller list. In addition, he is the top marketing instructor for Writer’s Digest and teaches the popular online course, Mastering Amazon for Authors.\n\nThe Author’s Guide to Marketing Books on Amazon (2024) is the ultimate guide to selling more books at the world’s largest retailer. Discover how to make your book stand out on Amazon’s website and grab a reader’s attention. Rob will show you how to', 1, '2024-07-21 11:03:10', '2024-07-21 11:03:10', NULL);



