CREATE TABLE reset_password (
	EMAIL VARCHAR2(100) NOT NULL UNIQUE,
	TOKEN VARCHAR2(32) NOT NULL,
	CREATED_AT TIMESTAMP(0) DEFAULT SYSTIMESTAMP
);

CREATE TABLE verify_email (
	EMAIL VARCHAR2(100) NOT NULL UNIQUE,
	TOKEN VARCHAR2(32) NOT NULL,
	CREATED_AT TIMESTAMP(0) DEFAULT SYSTIMESTAMP
);

