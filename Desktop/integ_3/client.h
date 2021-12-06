#ifndef CLIENT_H
#define CLIENT_H
#include<QString>
#include<QSqlQuery>
#include<QSqlQueryModel>
#include <QDebug>
#include<qsqlquerymodel.h>
#include<QSqlRecord>

class Client
{
private:
    int idC;
    QString nom;
    QString prenom;
    QString Adresse_mail;
    int Age;

public:
    Client();
    Client(int,QString,QString,QString,int);
    int get_id();
    QString get_nom();
    QString get_prenom();
    QString get_Adresse_mail();
    int get_age();
    void set_id(int);
    void set_nom(QString);
    void set_prenom(QString);
    void set_Adresse_mail(QString);
    void set_age(int);
    bool ajouter();
    QSqlQueryModel* afficher();
    bool supprimer(int);
    bool modifier();
    QSqlQueryModel* rechercher_id(int);
    QSqlQueryModel* triparAge();
    QSqlQueryModel* rechercher_nom(QString );
    QSqlQueryModel* rechercher_prenom(QString prenom);
    QSqlQueryModel * rechercher_nomprenom(QString nom, QString prenom);
    QSqlQueryModel * rechercher_nomid(QString nom, int idC);
    QSqlQueryModel * rechercher_prenomid(QString nom, int idC);
    QSqlQueryModel * rechercher_prenom_id_nom(QString prenom, int idC,QString nom);
    void statistique(QVector<double>* ticks);
    void statistique_1(QVector<double>* PlaceData);
    void statistique_2(QVector<double>* PlaceData);
    void statistique_3(QVector<double>* PlaceData);
    void statistique_4(QVector<double>* PlaceData);
    bool supprimer2(QString nom);
    QSqlQueryModel* triparNom();
   QSqlQueryModel* triparPrenom();
   QSqlQueryModel* triparAgeD();
   QSqlQueryModel* triparnomD();
   QSqlQueryModel* triparPrenomD();
};

#endif // CLIENT_H
