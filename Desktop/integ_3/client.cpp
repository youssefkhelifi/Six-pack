#include "client.h"
#include"integ.h"
Client::Client()
{
    idC=0;
    nom="";
    prenom="";
    Adresse_mail="";
    Age=0;
}
Client::Client(int id,QString n,QString p,QString A,int a)
{
    this->idC=id;
    this->nom=n;
    this->prenom=p;
    this->Adresse_mail=A;
    this->Age=a;
}
int Client::get_id(){return idC;}
QString Client::get_nom(){return nom;}
QString Client::get_prenom(){return prenom;}
QString Client::get_Adresse_mail(){return Adresse_mail;}
int Client::get_age(){return Age;}
void Client::set_id(int n){this->idC=n;}
void Client::set_nom(QString n){this->nom=n;}
void Client::set_prenom(QString p){this->prenom=p;}
void Client::set_Adresse_mail(QString A){this->Adresse_mail=A;}
void Client::set_age(int a){this->Age=a;}
bool Client::ajouter()
{

    QSqlQuery query;
    QString id_string=QString::number(idC);
    QString age_string=QString::number(Age);
          query.prepare("INSERT INTO Gestion_client (idC, nom, prenom,Adresse_mail,Age) "
                        "VALUES (:idC, :nom, :prenom, :Adresse_mail,:Age)");
          query.bindValue(0, id_string);
          query.bindValue(1, nom);
          query.bindValue(2, prenom);
          query.bindValue(3, Adresse_mail);
          query.bindValue(4, age_string);
          query.exec();


}
QSqlQueryModel* Client::afficher()
{
    QSqlQueryModel* model=new QSqlQueryModel();
          model->setQuery("SELECT* FROM Gestion_client");
          model->setHeaderData(0, Qt::Horizontal, QObject::tr("idC"));
          model->setHeaderData(1, Qt::Horizontal, QObject::tr("nom"));
          model->setHeaderData(2, Qt::Horizontal, QObject::tr("prenom"));
          model->setHeaderData(3, Qt::Horizontal, QObject::tr("Adresse_mail"));
          model->setHeaderData(4, Qt::Horizontal, QObject::tr("Age"));
    return model;
}
bool Client::supprimer(int idC)
{
    QSqlQuery query;
          query.prepare("Delete from Gestion_client where idC=:idC ");
          query.bindValue(0, idC);
          query.exec();
}
bool Client::modifier()
{

    QSqlQuery query;
    QString id_string=QString::number(idC);
    QString age_string=QString::number(Age);
        query.prepare("UPDATE Gestion_client SET nom=:nom,prenom=:prenom,Adresse_mail=:Adresse_mail,Age=:Age WHERE idC=:idC ");
        query.bindValue(":idC",id_string );
        query.bindValue(":nom",nom );
        query.bindValue(":prenom",prenom );
        query.bindValue(":Adresse_mail",Adresse_mail );
        query.bindValue(":Age", age_string);
         query.exec();

}

QSqlQueryModel* Client::rechercher_id(int idC)
{
    QSqlQuery * q = new  QSqlQuery ();
    QString id_string=QString::number(idC);
                     QSqlQueryModel * model = new  QSqlQueryModel ();
                     q->prepare("select * from Gestion_client where idC=:idC");
                     q->bindValue(":idC",id_string );
                     q->exec();

         model->setQuery(*q);
         model->setHeaderData(0, Qt::Horizontal, QObject::tr("idC"));
         model->setHeaderData(1, Qt::Horizontal, QObject::tr("nom"));
         model->setHeaderData(2, Qt::Horizontal, QObject::tr("prenom"));
         model->setHeaderData(3, Qt::Horizontal, QObject::tr("Adresse_mail"));
         model->setHeaderData(4, Qt::Horizontal, QObject::tr("Age"));


        return model;
 }
QSqlQueryModel* Client::triparAge()
{
QSqlQuery * q = new  QSqlQuery ();
                 QSqlQueryModel * model = new  QSqlQueryModel ();
                 q->prepare("SELECT * FROM Gestion_client order by Age ASC");
                 q->exec();
                 model->setQuery(*q);
                 model->setHeaderData(0, Qt::Horizontal, QObject::tr("idC"));
                 model->setHeaderData(1, Qt::Horizontal, QObject::tr("nom"));
                 model->setHeaderData(2, Qt::Horizontal, QObject::tr("prenom"));
                 model->setHeaderData(3, Qt::Horizontal, QObject::tr("Adresse_mail"));
                 model->setHeaderData(4, Qt::Horizontal, QObject::tr("Age"));
                 return model;


}
QSqlQueryModel* Client::triparNom()
{
QSqlQuery * q = new  QSqlQuery ();
                 QSqlQueryModel * model = new  QSqlQueryModel ();
                 q->prepare("SELECT * FROM Gestion_client order by nom ASC");
                 q->exec();
                 model->setQuery(*q);
                 model->setHeaderData(0, Qt::Horizontal, QObject::tr("idC"));
                 model->setHeaderData(1, Qt::Horizontal, QObject::tr("nom"));
                 model->setHeaderData(2, Qt::Horizontal, QObject::tr("prenom"));
                 model->setHeaderData(3, Qt::Horizontal, QObject::tr("Adresse_mail"));
                 model->setHeaderData(4, Qt::Horizontal, QObject::tr("Age"));
                 return model;


}

QSqlQueryModel* Client::triparPrenom()
{
QSqlQuery * q = new  QSqlQuery ();
                 QSqlQueryModel * model = new  QSqlQueryModel ();
                 q->prepare("SELECT * FROM Gestion_client order by prenom ASC");
                 q->exec();
                 model->setQuery(*q);
                 model->setHeaderData(0, Qt::Horizontal, QObject::tr("idC"));
                 model->setHeaderData(1, Qt::Horizontal, QObject::tr("nom"));
                 model->setHeaderData(2, Qt::Horizontal, QObject::tr("prenom"));
                 model->setHeaderData(3, Qt::Horizontal, QObject::tr("Adresse_mail"));
                 model->setHeaderData(4, Qt::Horizontal, QObject::tr("Age"));
                 return model;


}
QSqlQueryModel* Client::triparAgeD()
{
QSqlQuery * q = new  QSqlQuery ();
                 QSqlQueryModel * model = new  QSqlQueryModel ();
                 q->prepare("SELECT * FROM Gestion_client order by Age DESC");
                 q->exec();
                 model->setQuery(*q);
                 model->setHeaderData(0, Qt::Horizontal, QObject::tr("idC"));
                 model->setHeaderData(1, Qt::Horizontal, QObject::tr("nom"));
                 model->setHeaderData(2, Qt::Horizontal, QObject::tr("prenom"));
                 model->setHeaderData(3, Qt::Horizontal, QObject::tr("Adresse_mail"));
                 model->setHeaderData(4, Qt::Horizontal, QObject::tr("Age"));
                 return model;
}
QSqlQueryModel* Client::triparnomD()
{
QSqlQuery * q = new  QSqlQuery ();
                 QSqlQueryModel * model = new  QSqlQueryModel ();
                 q->prepare("SELECT * FROM Gestion_client order by nom DESC");
                 q->exec();
                 model->setQuery(*q);
                 model->setHeaderData(0, Qt::Horizontal, QObject::tr("idC"));
                 model->setHeaderData(1, Qt::Horizontal, QObject::tr("nom"));
                 model->setHeaderData(2, Qt::Horizontal, QObject::tr("prenom"));
                 model->setHeaderData(3, Qt::Horizontal, QObject::tr("Adresse_mail"));
                 model->setHeaderData(4, Qt::Horizontal, QObject::tr("Age"));
                 return model;
}
QSqlQueryModel* Client::triparPrenomD()
{
    QSqlQuery * q = new  QSqlQuery ();
                     QSqlQueryModel * model = new  QSqlQueryModel ();
                     q->prepare("SELECT * FROM Gestion_client order by prenom DESC");
                     q->exec();
                     model->setQuery(*q);
                     model->setHeaderData(0, Qt::Horizontal, QObject::tr("idC"));
                     model->setHeaderData(1, Qt::Horizontal, QObject::tr("nom"));
                     model->setHeaderData(2, Qt::Horizontal, QObject::tr("prenom"));
                     model->setHeaderData(3, Qt::Horizontal, QObject::tr("Adresse_mail"));
                     model->setHeaderData(4, Qt::Horizontal, QObject::tr("Age"));
                     return model;
}


QSqlQueryModel* Client::rechercher_nom(QString nom)
{
    QSqlQuery * q = new  QSqlQuery ();

                     QSqlQueryModel * model = new  QSqlQueryModel ();
                     q->prepare("select * from Gestion_client where nom=:nom");
                     q->bindValue(":nom",nom );
                     q->exec();

         model->setQuery(*q);
         model->setHeaderData(0, Qt::Horizontal, QObject::tr("idC"));
         model->setHeaderData(1, Qt::Horizontal, QObject::tr("nom"));
         model->setHeaderData(2, Qt::Horizontal, QObject::tr("prenom"));
         model->setHeaderData(3, Qt::Horizontal, QObject::tr("Adresse_mail"));
         model->setHeaderData(4, Qt::Horizontal, QObject::tr("Age"));


        return model;

}
QSqlQueryModel* Client::rechercher_prenom(QString prenom)
{

    QSqlQuery * q = new  QSqlQuery ();

                     QSqlQueryModel * model = new  QSqlQueryModel ();
                     q->prepare("select * from Gestion_client where prenom=:prenom");
                     q->bindValue(":prenom",prenom );
                     q->exec();

         model->setQuery(*q);
         model->setHeaderData(0, Qt::Horizontal, QObject::tr("idC"));
         model->setHeaderData(1, Qt::Horizontal, QObject::tr("nom"));
         model->setHeaderData(2, Qt::Horizontal, QObject::tr("prenom"));
         model->setHeaderData(3, Qt::Horizontal, QObject::tr("Adresse_mail"));
         model->setHeaderData(4, Qt::Horizontal, QObject::tr("Age"));


        return model;

}
QSqlQueryModel * Client::rechercher_nomprenom(QString nom, QString prenom)
{
    QSqlQuery *qry= new QSqlQuery();
    QSqlQueryModel *model = new QSqlQueryModel();
    qry->prepare("select * from produit where prenom=:prenom and nom=:nom");
    qry->bindValue(":prenom",prenom);
    qry->bindValue(":nom",nom);
    qry->exec();

       model->setQuery(*qry);
       model->setHeaderData(0, Qt::Horizontal, QObject::tr("idC"));
       model->setHeaderData(1, Qt::Horizontal, QObject::tr("nom"));
       model->setHeaderData(2, Qt::Horizontal, QObject::tr("prenom"));
       model->setHeaderData(3, Qt::Horizontal, QObject::tr("Adresse_mail"));
       model->setHeaderData(4, Qt::Horizontal, QObject::tr("Age"));

        return model;


}
QSqlQueryModel * Client::rechercher_nomid(QString nom, int idC)
{
    QSqlQuery *qry= new QSqlQuery();
    QString id_string=QString::number(idC);
    QSqlQueryModel *model = new QSqlQueryModel();
    qry->prepare("select * from produit where idC=:idC and nom=:nom");
    qry->bindValue(":idC",id_string );
    qry->bindValue(":nom",nom);
    qry->exec();

       model->setQuery(*qry);
       model->setHeaderData(0, Qt::Horizontal, QObject::tr("idC"));
       model->setHeaderData(1, Qt::Horizontal, QObject::tr("nom"));
       model->setHeaderData(2, Qt::Horizontal, QObject::tr("prenom"));
       model->setHeaderData(3, Qt::Horizontal, QObject::tr("Adresse_mail"));
       model->setHeaderData(4, Qt::Horizontal, QObject::tr("Age"));

        return model;


}
QSqlQueryModel * Client::rechercher_prenomid(QString prenom, int idC)
{
    QSqlQuery *qry= new QSqlQuery();
    QString id_string=QString::number(idC);
    QSqlQueryModel *model = new QSqlQueryModel();
    qry->prepare("select * from produit where idC=:idC and prenom=:prenom");
    qry->bindValue(":idC",id_string );
    qry->bindValue(":prenom",prenom);
    qry->exec();

       model->setQuery(*qry);
       model->setHeaderData(0, Qt::Horizontal, QObject::tr("idC"));
       model->setHeaderData(1, Qt::Horizontal, QObject::tr("nom"));
       model->setHeaderData(2, Qt::Horizontal, QObject::tr("prenom"));
       model->setHeaderData(3, Qt::Horizontal, QObject::tr("Adresse_mail"));
       model->setHeaderData(4, Qt::Horizontal, QObject::tr("Age"));

        return model;


}
QSqlQueryModel * Client::rechercher_prenom_id_nom(QString prenom, int idC,QString nom)
{
    QSqlQuery *qry= new QSqlQuery();
    QString id_string=QString::number(idC);
    QSqlQueryModel *model = new QSqlQueryModel();
    qry->prepare("select * from produit where idC=:idC and prenom=:prenom and nom=:nom");
    qry->bindValue(":idC",id_string );
    qry->bindValue(":prenom",prenom);
    qry->bindValue(":nom",nom);
    qry->exec();

       model->setQuery(*qry);
       model->setHeaderData(0, Qt::Horizontal, QObject::tr("idC"));
       model->setHeaderData(1, Qt::Horizontal, QObject::tr("nom"));
       model->setHeaderData(2, Qt::Horizontal, QObject::tr("prenom"));
       model->setHeaderData(3, Qt::Horizontal, QObject::tr("Adresse_mail"));
       model->setHeaderData(4, Qt::Horizontal, QObject::tr("Age"));

        return model;


}
void Client::statistique(QVector<double>* PlaceData)
{
    QSqlQuery q;
    int i=0;
    q.exec("select Age from Gestion_client");
    while (q.next())
    {
        if(q.value(0).toInt()>15)
            i++;
    }
    *PlaceData<< i;
}
void Client::statistique_1(QVector<double>* PlaceData)
{
    QSqlQuery q;
    int i=0;
    q.exec("select Age from Gestion_client");
    while (q.next())
    {
        if((q.value(0).toInt())>15&&(q.value(0).toInt()<25))
            i++;
    }
    *PlaceData<< i;
}
void Client::statistique_2(QVector<double>* PlaceData)
{
    QSqlQuery q;
    int i=0;
    q.exec("select Age from Gestion_client");
    while (q.next())
    {
        if((q.value(0).toInt())>25&&(q.value(0).toInt()<35))
            i++;
    }
    *PlaceData<< i;
}
void Client::statistique_3(QVector<double>* PlaceData)
{
    QSqlQuery q;
    int i=0;
    q.exec("select Age from Gestion_client");
    while (q.next())
    {
        if((q.value(0).toInt())>35&&(q.value(0).toInt()<45))
            i++;
    }
    *PlaceData<< i;
}
void Client::statistique_4(QVector<double>* PlaceData)
{
    QSqlQuery q;
    int i=0;
    q.exec("select Age from Gestion_client");
    while (q.next())
    {
        if(q.value(0).toInt()>45)
            i++;
    }
    *PlaceData<< i;
}
bool Client::supprimer2(QString nom)
{
    QSqlQuery query;
          query.prepare("Delete from Gestion_client where nom=:nom ");
          query.bindValue(0, nom);
          query.exec();
}
