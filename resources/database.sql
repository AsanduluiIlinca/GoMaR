CREATE TABLE user (
     id INT NOT NULL AUTO_INCREMENT,
     username VARCHAR(40) NOT NULL,
     email VARCHAR(70) NOT NULL,
     password VARCHAR(50) NOT NULL,
     admin BOOLEAN NOT NULL,
     firstname VARCHAR(70) NOT NULL,
     lastname VARCHAR(70) NOT NULL,
     birthday DATE,
     gender VARCHAR(15) NOT NULL,
     social_status VARCHAR(70) NOT NULL,
     employed VARCHAR(10) NOT NULL,
     working_place VARCHAR(70),
     job VARCHAR(70),
     country VARCHAR(70) NOT NULL,
     town VARCHAR(70) NOT NULL,
     ethnicity VARCHAR(70) NOT NULL,
     languages VARCHAR(255),
     PRIMARY KEY (id) 
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE category (
     id INT NOT NULL AUTO_INCREMENT,
     name VARCHAR(25),
     PRIMARY KEY (id)
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE test (
     id INT NOT NULL AUTO_INCREMENT,
     category_id INT NOT NULL,
     PRIMARY KEY (id),
     FOREIGN KEY (category_id) REFERENCES category(id)
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE test_visit (
     id INT NOT NULL AUTO_INCREMENT,
     user_id INT NOT NULL,
     test_id INT NOT NULL,
     score INT,
     PRIMARY KEY (id),
     FOREIGN KEY (user_id) REFERENCES user(id),
     FOREIGN KEY (test_id) REFERENCES test(id)
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE question (
     id INT NOT NULL AUTO_INCREMENT,
     test_id INT NOT NULL,
     question VARCHAR(255),
     difficulty INT,
     PRIMARY KEY (id),
     FOREIGN KEY (test_id) REFERENCES test(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE answer (
     id INT NOT NULL AUTO_INCREMENT,
     question_id INT NOT NULL,
     answer VARCHAR(255),
     valid BOOLEAN,
     PRIMARY KEY (id),
     FOREIGN KEY (question_id) REFERENCES question(id)
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
