__author__ = 'n8036039'
import mysql.connector

def php_class(col, tablename):
    print "class " + tablename +"{"

    print "\tfunction __construct(\t$"+col[0][0]+","
    num = len(col[1:])
    counter = 0
    for v in col[1:]:
        counter += 1
        if counter >= num:
            print "\t\t$" + v[0]
        else:
            print "\t\t$" + v[0] + ", "
    print "\t){"
    for c in col:
        print "\t\t$this->"+c[0]+" = "+c[0]
    print "\t}\n"

    print "\tfunction create()"
    print "\t\tcreate_"+tablename+"(\t$this->"+col[0][0]+","
    counter = 0
    num = len(col[1:])
    for c in col[1:]:
        counter += 1
        if counter >= num:
            print "\t\t\t\t\t\t\t\t\t$this->"+c[0]
        else:
            print "\t\t\t\t\t\t\t\t\t$this->"+c[0]+","
    print "\t\t)"
    print "\t}\n"

    print "\tfunction read()"
    print "\t\tread_"+tablename+"(\t$this->"+col[0][0]+","
    counter = 0
    for c in col[1:]:
        counter += 1
        if c[3] == "PRI":
            if counter >= num:
                print "\t\t\t\t\t\t\t\t\t$this->"+c[0]
            else:
                print "\t\t\t\t\t\t\t\t\t$this->"+c[0]+","
    print "\t\t)"
    print "\t}\n"

    print "\tfunction update()"
    print "\t\tread_"+tablename+"(\t$this->"+col[0][0]+","
    counter = 0
    for c in col[1:]:
        counter += 1
        if counter >= num:
            print "\t\t\t\t\t\t\t\t\t$this->"+c[0]
        else:
            print "\t\t\t\t\t\t\t\t\t$this->"+c[0]+","
    print "\t\t)"
    print "\t}\n"

    print "\tfunction delete()"
    print "\t\tread_"+tablename+"(\t$this->"+col[0][0]+","
    counter = 0
    for c in col[1:]:
        counter += 1
        if c[3] == "PRI":
            if counter >= num:
                print "\t\t\t\t\t\t\t\t\t$this->"+c[0]
            else:
                print "\t\t\t\t\t\t\t\t\t$this->"+c[0]+","
    print "\t\t)"
    print "\t}"
    print "}\n\n"



cnx = mysql.connector.connect(user='root', database='NetworkInventory',buffered=True)
cur1 = cnx.cursor()
cur2 = cnx.cursor()
cur1.execute("SHOW Tables From NetworkInventory")
table = cur1.fetchall()
for t in table:
    cur2.execute("SHOW COLUMNS FROM "+t[0])
    #print "<"+t[0]+">"
    columns = cur2.fetchall()
    php_class(columns, t[0])

cnx.close()

