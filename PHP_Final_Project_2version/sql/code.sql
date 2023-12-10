-- Admin data
-- first table is for user registered as data administrators
-- 8 data fields including the auto increment PK

CREATE table phpadmins1(
                          user_idAD int not null auto_increment,
                          first_nameAD varchar (200),
                          last_nameAD varchar (200),
                          emailAD varchar (200),
                          usernameAD varchar (200),
                          passwordAD varchar (200),
                          nameImageAD varchar (200),
                          fileImageAD varchar (200), -- not directly input by user
                          primary key (user_idAD)

);

-- Website content
-- second table is for the website content
-- 9 data fields including the auto increment PK

CREATE table phppeople1(
                          ID int not null auto_increment,
                          fname varchar (200),
                          lname varchar (200),
                          email varchar (200),
                          phoneNumber varchar (200),
                          college varchar (200),
                          city varchar (200),
                          programLanguages  varchar (300),
                          operatingSystems  varchar (300),
                          primary key (ID)
);


INSERT into phppeople1(fname, lname, email, phoneNumber,college,city,programLanguages,operatingSystems)
VALUES
    ('Ana', 'Anderson', 'aanderson@email.ca', '7051234567','Georgian College','Barrie','C#,Java,Python','Windows,macOS'),
    ('Berny', 'Benton', 'bbenton1@email.ca', '7051234561','Georgian College','Orillia','HTML,Java,PHP','Windows'),
    ('Cindy', 'Clarkson', 'ccson15@email.ca', '7051288861','Westin College','Muskoka','Java,PHP','Windows,Linux'),
    ('David', 'Delaine', 'ddelain@umail.com', '7051200810','Kirlian College','Bradford','C#,Java,PHP','Windows,macOS'),
    ('Elena', 'Evans', 'umievan@tmail.com', '7059210811','Westin College','Orillia','C#,Python,PHP','Windows');




