CREATE DATABASE QuanLyCanHo_Website
GO

USE QuanLyCanHo_Website
GO

/*TABLE AREA*/
--TABLE INCLUDES ACCOUNT INFORMATION
CREATE TABLE tbl_account
(
	ACCOUNT_ID INT AUTO_INCREMENT PRIMARY KEY,
	NAME VARCHAR(255),
	USERNAME VARCHAR(255),
	PASSWORD VARCHAR(255),
	LEVEL INT
)
GO

--TABLE INCLUDES APARTMENT CART
CREATE TABLE tbl_apartment_cart
(	
	APARTMENT_CODE VARCHAR(255) PRIMARY KEY,
	AGENCY_NAME VARCHAR(255),
	AREA_APART VARCHAR(255),
	HOUSE_OWNER VARCHAR(255),
	PHONE_OWNER VARCHAR(255),
	EMAIL_OWNER VARCHAR(255),
	BEDROOM VARCHAR(255),
	SQM FLOAT,
	STATUS_APART VARCHAR(255) DEFAULT 'AVAILABLE'
)
GO

--TABLE INCLUDES APARTMENT INFORMATION
CREATE TABLE tbl_apartment_rented
(
	APARTMENT_CODE VARCHAR(255) PRIMARY KEY,
	HOUSE_OWNER VARCHAR(255),
	PHONE_OWNER VARCHAR(255),
	EMAIL_OWNER VARCHAR(255),
	AGENCY_NAME VARCHAR(255),
	AREA_APART VARCHAR(255),
	TAX_CODE VARCHAR(255),
	TAX_DECLARATION_FORM VARCHAR(255),
	TAX_APARTMENT VARCHAR(255),
	FEE_PER_MONTH FLOAT,
	TAX_FEE FLOAT,
	TAX_DECLARE FLOAT,
	TAX_MANAGEMENT FLOAT,
	REFUND_FOR_TENANT FLOAT,
	CLEANING_FEE FLOAT,
	TOTAL FLOAT,
	START_DAY DATE,
	END_DAY DATE,
	DAY_REMIND INT,
	PAYMENT_TERM INT,
	FOREIGN KEY(APARTMENT_CODE) REFERENCES tbl_apartment_cart(APARTMENT_CODE)
)
GO


--TABLE INCLUDES APARTMENT NEED TO PAY MONEY FOR ITS TAX
CREATE TABLE tbl_apartment_money
(
	APARTMENT_CODE VARCHAR(255) PRIMARY KEY,
	HOUSE_OWNER VARCHAR(255),
	PHONE_OWNER VARCHAR(255),
	EMAIL_OWNER VARCHAR(255),
	AGENCY_NAME VARCHAR(255),
	AREA_APART VARCHAR(255),
	START_DAY_TERM DATE,
	END_DAY_TERM DATE,
	PAYMENT_TERM INT,
	TOTAL_AMOUNT FLOAT,
	STATUS_APART VARCHAR(255) DEFAULT 'Not yet collected',
	FOREIGN KEY(APARTMENT_CODE) REFERENCES tbl_apartment_rented(APARTMENT_CODE)
)
GO

--TABLE INCLUDES APARTMENT NEED TO NEGOTIATE ABOUT CONTRACT
CREATE TABLE tbl_apartment_contract
(
	APARTMENT_CODE VARCHAR(255) PRIMARY KEY,
	HOUSE_OWNER VARCHAR(255),
	PHONE_OWNER VARCHAR(255),
	EMAIL_OWNER VARCHAR(255),
	AGENCY_NAME VARCHAR(255),
	AREA_APART VARCHAR(255),
	START_DAY DATE,
	END_DAY DATE,
	FEE_PER_MONTH FLOAT,
	TAX_FEE FLOAT,
	TAX_MANAGEMENT FLOAT,
	REFUND_FOR_TENANT FLOAT,
	CLEANING_FEE FLOAT,
	DATE_REMIND DATE,
	NUM_DAY_REMIND INT,
	STATUS_APART VARCHAR(255) DEFAULT 'NOT DONE',
	FOREIGN KEY(APARTMENT_CODE) REFERENCES tbl_apartment_rented(APARTMENT_CODE)
)
GO

--TABLE INCLUDES INFORMATION OF APARTMENT_FINANCE
CREATE TABLE tbl_apartment_finance
(
	APARTMENT_CODE VARCHAR(255) PRIMARY KEY,
	TAX_FEE FLOAT,
	TAX_DECLARE FLOAT,
	TAX_MANAGEMENT FLOAT,
	REFUND_FOR_TENANT FLOAT,
	CLEANING_FEE FLOAT,
	TOTAL_AMOUNT FLOAT,
	STATUS_TAX_FEE INT DEFAULT 0,
	STATUS_TAX_DECLARE INT DEFAULT 0,
	STATUS_TAX_MANAGEMENT INT DEFAULT 0,
	STATUS_REFUND_FOR_TENANT INT DEFAULT 0,
	STATUS_CLEANING_FEE INT DEFAULT 0,
	STATUS_TOTAL_AMOUNT INT DEFAULT 0,
	FOREIGN KEY(APARTMENT_CODE) REFERENCES tbl_apartment_rented(APARTMENT_CODE)
)
GO

--TABLE INCLUDES INFORMATION OF APARTMENT_SELLING
CREATE TABLE tbl_apartment_selling
(
	APARTMENT_CODE VARCHAR(255) PRIMARY KEY,
	HOUSE_OWNER VARCHAR(255),
	PHONE_OWNER VARCHAR(255),
	EMAIL_OWNER VARCHAR(255),
	AGENCY_NAME VARCHAR(255),
	AREA_APART VARCHAR(255),
	BEDROOM VARCHAR(255),
	SQM FLOAT,
	USD_PRICE FLOAT,
	VND_PRICE FLOAT,
	DATE_INPUT_DATA DATE,
	NOTE VARCHAR(255)
)
GO

--TABLE INCLUDES INFORMATION OF APARTMENT_NOT_RENTED
CREATE TABLE tbl_apartment_not_rented
(
	APARTMENT_CODE VARCHAR(255) PRIMARY KEY,
	HOUSE_OWNER VARCHAR(255),
	PHONE_OWNER VARCHAR(255),
	AGENCY_NAME VARCHAR(255),
	AREA_APART VARCHAR(255),
	BEDROOM VARCHAR(255),
	SQM FLOAT,
	STATUS_APART VARCHAR(255)
)
GO

/*PROC AREA*/
-- PROC FOR LOGIN
CREATE PROC Login
@userName NVARCHAR(50), @passWord NVARCHAR(50)
AS
BEGIN
	SELECT * FROM ACCOUNT WHERE USERNAME = @userName AND PASSWORD = @passWord
END
GO

--PROC FOR DELETING INFORMATION OF APARMENT IN APARTMENTINFO AND APARTMENTMONEY
CREATE PROC DELETING_APARTMENT
apartment_code VARCHAR(255)
AS
BEGIN
	DELETE FROM tbl_apartment_money WHERE APARTMENT_CODE = apartment_code;
	DELETE FROM tbl_apartment_contract WHERE APARTMENT_CODE = apartment_code;
	DELETE FROM tbl_apartment_finance WHERE APARTMENT_CODE = apartment_code;
	DELETE FROM tbl_apartment_rented WHERE APARTMENT_CODE = apartment_code;
END
GO

--PROC FOR NEXT CYCLING NGAYCANTHU FOR APARTMENT_MONEY
CREATE PROC NEXT_MONEY_DAY
apartment_code VARCHAR(255)
AS
BEGIN
	
	DECLARE term INT;
	DECLARE start_term DATE;
	DECLARE end_term DATE;
	DECLARE start_term_next DATE;
	DECLARE end_term_next DATE;

	SELECT PAYMENT_TERM INTO term FROM tbl_apartment_money WHERE APARTMENT_CODE = apartment_code;
	SELECT START_DAY_TERM INTO start_term FROM tbl_apartment_money WHERE APARTMENT_CODE = apartment_code;
	SELECT END_DAY_TERM INTO end_term FROM tbl_apartment_money WHERE APARTMENT_CODE = apartment_code;
	
	SET start_term_next = ADDDATE(end_term, INTERVAL 1 DAY);
	SET end_term_next = ADDDATE(end_term, INTERVAL term MONTH);

	UPDATE tbl_apartment_money
	SET START_DAY_TERM = start_term_next
	,END_DAY_TERM = end_term_next
	,STATUS_APART = 'Not yet collected'
	WHERE APARTMENT_CODE = apartment_code;

	UPDATE tbl_apartment_finance
	SET STATUS_TAX_FEE = 0, STATUS_TAX_DECLARE = 0, STATUS_TAX_MANAGEMENT= 0, 
		STATUS_REFUND_FOR_TENANT = 0, STATUS_CLEANING_FEE = 0, STATUS_TOTAL_AMOUNT  = 0
	WHERE APARTMENT_CODE = apartment_code;

END
GO

CREATE TABLE tbl_apartment_rented
(
	APARTMENT_CODE VARCHAR(255) PRIMARY KEY,
	HOUSE_OWNER VARCHAR(255),
	PHONE_OWNER VARCHAR(255),
	EMAIL_OWNER VARCHAR(255),
	AGENCY_NAME VARCHAR(255),
	AREA_APART VARCHAR(255),
	TAX_CODE VARCHAR(255),
	TAX_DECLARATION_FORM VARCHAR(255),
	TAX_APARTMENT VARCHAR(255),
	FEE_PER_MONTH FLOAT,
	TAX_FEE FLOAT,
	TAX_DECLARE FLOAT,
	TAX_MANAGEMENT FLOAT,
	REFUND_FOR_TENANT FLOAT,
	CLEANING_FEE FLOAT,
	TOTAL FLOAT,
	START_DAY DATE,
	END_DAY DATE,
	DAY_REMIND INT,
	PAYMENT_TERM INT,
	FOREIGN KEY(APARTMENT_CODE) REFERENCES tbl_apartment_cart(APARTMENT_CODE)
)

/*TRIGGER AREA*/
--TRIGGER FOR ADDING INFORMATION FOR APARTMENT MONEY
CREATE TRIGGER ADDING_APARTMENT_MONEY
ON tbl_apartment_rented
FOR INSERT
AS
BEGIN
	DECLARE apart_code VARCHAR(255);

	DECLARE term INT;
	DECLARE start_term DATE;
	DECLARE end_term DATE;
	DECLARE end_term_minus DATE;
	DECLARE total FLOAT;

	
	SET apart_code = NEW.APARTMENT_CODE;

	SET start_term = NEW.START_DAY;
	SET term = NEW.PAYMENT_TERM;
	SET total = NEW.TOTAL;

	SET end_term = ADDDATE(start_term, INTERVAL term MONTH);
	SET end_term_minus = ADDDATE(end_term, INTERVAL -1 DAY);
	
	INSERT INTO tbl_apartment_money(APARTMENT_CODE, START_DAY_TERM, END_DAY_TERM, PAYMENT_TERM, TOTAL_AMOUNT)
	VALUES(apart_code, start_term, end_term_minus, term, total);
END
GO

--TRIGGER FOR ADDING INFORMATION FOR APARTMENT_CONTRACT
CREATE TRIGGER ADDING_APARTMENT_CONTRACT
ON tbl_apartment_rented
FOR INSERT
AS
BEGIN
	DECLARE apart_code VARCHAR(255);
	
	DECLARE fee_tax FLOAT;
	DECLARE fee_management FLOAT;
	DECLARE tenant_refund FLOAT;
	DECLARE fee_cleaning FLOAT;
	DECLARE fee_per_month FLOAT;

	DECLARE day_start DATE;
	DECLARE day_end DATE;

	DECLARE num_day_remind INT;
	DECLARE remind_date DATE;

	SET apart_code = NEW.APARTMENT_CODE;

	SET fee_tax = NEW.TAX_FEE;
	SET fee_management = NEW.TAX_MANAGEMENT;
	SET tenant_refund = NEW.REFUND_FOR_TENANT;
	SET fee_cleaning = NEW.CLEANING_FEE;
	SET fee_per_month = NEW.FEE_PER_MONTH;

	SET day_start = NEW.START_DAY;
	SET day_end = NEW.END_DAY;

	SET num_day_remind = NEW.DAY_REMIND;

	SET remind_date = ADDDATE(day_end, INTERVAL -num_day_remind DAY);

	INSERT INTO tbl_apartment_contract(APARTMENT_CODE,START_DAY,END_DAY,FEE_PER_MONTH,TAX_FEE,
	TAX_MANAGEMENT,REFUND_FOR_TENANT,CLEANING_FEE,DATE_REMIND,NUM_DAY_REMIND) 
	VALUES(apart_code,day_start,day_end,fee_per_month,
	fee_tax,fee_management,tenant_refund,fee_cleaning,remind_date,num_day_remind);
END
GO

--TRIGGER FOR ADDING INFORMATION FOR APARTMENT_FINANCE
CREATE TRIGGER ADDING_APARTMENT_FINANCE
ON tbl_apartment_rented
FOR INSERT
AS
BEGIN

	DECLARE apart_code VARCHAR(255);

	DECLARE fee_tax FLOAT;
	DECLARE fee_declare_tax FLOAT;
	DECLARE fee_management FLOAT;
	DECLARE tenant_refund FLOAT;
	DECLARE fee_cleaning FLOAT;
	DECLARE total_amount FLOAT;

	SET apart_code = NEW.APARTMENT_CODE;

	SET fee_tax = NEW.TAX_FEE;
	SET fee_declare_tax = NEW.TAX_DECLARE;
	SET fee_management = NEW.TAX_MANAGEMENT;
	SET tenant_refund = NEW.REFUND_FOR_TENANT;
	SET fee_cleaning = NEW.CLEANING_FEE;
	SET total_amount = NEW.TOTAL;

	INSERT INTO tbl_apartment_finance(APARTMENT_CODE, TAX_FEE, TAX_DECLARE, TAX_MANAGEMENT, 
	REFUND_FOR_TENANT, CLEANING_FEE, TOTAL_AMOUNT) 
	VALUES(apart_code, fee_tax, fee_declare_tax, fee_management, tenant_refund, fee_cleaning, total_amount);

END
GO

--TRIGGER FOR REMOVING APARTMENT_CART WHEN ADDING NEW RENTED APARTMENT
CREATE TRIGGER REMOVING_APARMENT_CART
ON APARTMENT_INFO
FOR INSERT
AS
BEGIN
	
	DECLARE apartment_code VARCHAR(255);

	SET apartment_code = NEW.APARTMENT_CODE;

	UPDATE tbl_apartment_cart
	SET STATUS_APART = 'NOT AVAILABLE'
	WHERE APARTMENT_CODE = apartment_code;

END
GO

--TRIGGER FOR REMOVING APARTMENT_CART WHEN ADDING NEW RENTED APARTMENT
CREATE TRIGGER ADDING_APARMENT_CART
ON APARTMENT_INFO
FOR DELETE
AS
BEGIN
	
	DECLARE apartment_code VARCHAR(255);

	SET apartment_code = OLD.APARTMENT_CODE;

	UPDATE tbl_apartment_cart
	SET STATUS_APART = 'AVAILABLE'
	WHERE APARTMENT_CODE = apartment_code;

END
GO

/*DEFAULT AREA*/
--CREATE DEFAULT ACCOUNT FOR PROGRAM
INSERT INTO ACCOUNT(USERNAME,PASSWORD) VALUES('admin1','2251022057731868917119086224872421513662')
GO


CREATE PROCEDURE ADDING_HOUSE_OWNER_INFO(IN apartment_code VARCHAR(255))
BEGIN
	DECLARE area VARCHAR(255);
	DECLARE agency VARCHAR(255);
	DECLARE house_ower_name VARCHAR(255);
    DECLARE email VARCHAR(255);
    DECLARE phone VARCHAR(255);

	SELECT AREA_APART INTO area FROM tbl_apartment_cart WHERE APARTMENT_CODE = apartment_code;
	SELECT AGENCY_NAME INTO agency FROM tbl_apartment_cart WHERE APARTMENT_CODE = apartment_code;
	SELECT HOUSE_OWNER INTO house_ower_name FROM tbl_apartment_cart WHERE APARTMENT_CODE = apartment_code;
    SELECT EMAIL_OWNER INTO email FROM tbl_apartment_cart WHERE APARTMENT_CODE = apartment_code;
    SELECT PHONE_OWNER INTO phone FROM tbl_apartment_cart WHERE APARTMENT_CODE = apartment_code;

	UPDATE tbl_apartment_rented
	SET AREA_APART = area, 
		AGENCY_NAME = agency,
		HOUSE_OWNER = house_ower_name,
    	EMAIL_OWNER = email,
        PHONE_OWNER = phone
	WHERE APARTMENT_CODE = apartment_code;

	UPDATE tbl_apartment_contract
	SET AREA_APART = area, 
		AGENCY_NAME = agency,
		HOUSE_OWNER = house_ower_name,
    	EMAIL_OWNER = email,
        PHONE_OWNER = phone
	WHERE APARTMENT_CODE = apartment_code;

	UPDATE tbl_apartment_money
	SET AREA_APART = area, 
		AGENCY_NAME = agency,
		HOUSE_OWNER = house_ower_name,
    	EMAIL_OWNER = email,
        PHONE_OWNER = phone
	WHERE APARTMENT_CODE = apartment_code;
END

