
import mysql.connector

def where(cols):
    counter = 0
    num = len(cols)
    if num == 1:
        print "\tWHERE "+cols[0] + " = _" + cols[0]+';'
    else:
        print "\tWHERE "+cols[0] + " = _" + cols[0]

    num = len(cols[1:])
    for var in cols[1:]:
        counter += 1
        if counter >= num:
            print "\t\tAND "+var+" = _"+var+";"
        else:
            print "\t\tAND "+var+" = _"+var

def params(col):
    cols = []
    num = len(col)
    counter = 0
    for c in col:
        counter += 1
        cols.append(c[0])
        if counter >= num:
            print "\t\t\t IN _"+c[0], c[1]
        else:
            print "\t\t\t IN _"+c[0], c[1]+","
    return cols


def pri_params(col):
    cols = []
    pri = []
    for c in col:
        cols.append(c[0])
        if c[3] == "PRI":
            pri.append(c)

    num = len(pri)
    counter = 0
    for c in pri:
        counter += 1
        if counter >= num:
            print "\t\t\t IN _"+c[0], c[1]
        else:
            print "\t\t\t IN _"+c[0], c[1]+","
    return cols


def create(col, tablename):
    print "DELIMITER $$"
    print "CREATE PROCEDURE create_"+tablename+" ("
    cols = params(col)
    print ")"
    print "BEGIN"
    print "\tINSERT INTO " + database+"."+tablename + " ({!s}) values (_{!s});".format(', '.join(cols), ', _'.join(cols))
    print "END$$"
    print "DELIMITER ;"


def read(col, tablename):
    print "DELIMITER $$"
    print "CREATE PROCEDURE read_"+tablename+" ("
    cols = pri_params(col)
    print ")"
    print "BEGIN"
    print "\tSELECT * FROM " + database+"."+tablename
    where(cols)
    print "END$$"
    print "DELIMITER ;"


def update(col, tablename):
    print "DELIMITER $$"
    print "CREATE PROCEDURE update_"+tablename+" ("
    cols_all = []
    pri = []
    cols = []
    num = len(col)
    counter = 0
    for c in col:
        cols_all.append(c[0])
        counter += 1
        if c[3] == "PRI":
            pri.append(c[0])
        else:
            cols.append(c[0])
        if counter >= num:
            print "\t\t\t IN _"+c[0], c[1]
        else:
            print "\t\t\t IN _"+c[0], c[1]+","
    print ")"
    print "BEGIN"
    print "\tUPDATE  " + database+"."+tablename
    print "\tSET"
    counter = 0
    num = len(cols_all)
    for var in cols_all:
        counter += 1
        if counter >= num:
            print "\t\t"+var+" = _"+var
        else:
            print "\t\t"+var+" = _"+var+","
    where(pri)

    print "END$$"
    print "DELIMITER ;"


def delete(col, tablename):
    print "DELIMITER $$"
    print "CREATE PROCEDURE delete_"+tablename+" ("
    cols = pri_params(col)
    print ")"
    print "BEGIN"
    print "\tDELETE FROM " + database+"."+tablename
    where(cols)

    print "END$$"
    print "DELIMITER ;"


database = 'NetworkInventory'
cnx = mysql.connector.connect(user='root', database=database, buffered=True)
cur1 = cnx.cursor()
cur2 = cnx.cursor()
cur1.execute("SHOW Tables From NetworkInventory")
table = cur1.fetchall()
for t in table:
    cur2.execute("SHOW COLUMNS FROM "+t[0])
    columns = cur2.fetchall()
    create(columns, t[0])
    print "\n"
    read(columns, t[0])
    print "\n"
    update(columns, t[0])
    print "\n"
    delete(columns, t[0])
    print "\n"
cnx.close()