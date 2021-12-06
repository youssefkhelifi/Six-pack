#include "connection.h"
//Test tutoriel git
Connection::Connection()
{

}

bool Connection::createconnect()
{bool test=false;
QSqlDatabase db = QSqlDatabase::addDatabase("QODBC");
db.setDatabaseName("test-bd");
db.setUserName("jaziri");//inserer nom de l'utilisateur
db.setPassword("jaziri");//inserer mot de passe de cet utilisateur

if (db.open())
test=true;





    return  test;
}
