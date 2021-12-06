#include "integ.h"
#include "ui_integ.h"
#include "client.h"
#include <QMessageBox>
#include <QIntValidator>
#include <QRegExpValidator>
#include "smtp.h"
#include "QRcode.hhp"
#include <QPlainTextEdit>
#include <QPrinter>
#include <QPrinterInfo>
#include <QPrintDialog>
#include <QTextStream>
#include <QPainter>
#include <QTextStream>
#include "qcustomplot.h"
#include <QFileDialog>
#include <QTextDocument>
#include <QtPrintSupport/QPrinter>
#include <QFileDialog>
#include <QTextDocument>

#include <QSqlTableModel>
#include <QUrl>
#include <QTableView>
#include <QAbstractItemView>

using namespace qrcodegen;
integ::integ(QWidget *parent) :
    QDialog(parent),
    ui(new Ui::integ)
{
    ui->setupUi(this);
        ui->le_CIN->setValidator(new QIntValidator(0 , 9999999, this));
        ui->tab_client->setModel(C.afficher());
        ui->le_Age->setValidator(new QIntValidator(0 , 99, this));

    #define NOM_RX "^([a-z]+[,.]?[ ]?|[a-z]+['-]?)+$"
           QRegExp rxNom(NOM_RX);
           QRegExpValidator*valiNom= new QRegExpValidator(rxNom,this);

    #define addr "^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$"
           QRegExp r(addr);
           QRegExpValidator*valiadd= new QRegExpValidator(r,this);


        ui->le_NOM->setValidator(valiNom);
        ui->le_Prenom->setValidator(valiNom);
        ui->le_Adresse_mail->setValidator(valiadd);
        ui->ln_envoyermail_to->setValidator(valiadd);
        ui->ln_rechercher_id->setValidator(new QIntValidator(0 , 9999999, this));
        ui->ln_recherche_nom->setValidator(valiNom);
        ui->ln_chercher_prenom->setValidator(valiNom);


        /***************/

}

integ::~integ()
{
    delete ui;
}

void integ::on_pb_ajouter_clicked()
{
    int id=ui->le_CIN->text().toInt();
        QString n=ui->le_NOM->text();
        QString p=ui->le_Prenom->text();
        QString A=ui->le_Adresse_mail->text();
        int a=ui->le_Age->text().toInt();

        Client C(id,n,p,A,a);
        bool test=C.ajouter();


                if (test)
                {


                    QMessageBox::information(nullptr, QObject::tr("Ajout produit"),
                                QObject::tr("client ajouté.\n"
                                            "Click Cancel to exit."), QMessageBox::Cancel);
                            ui->tab_client->setModel(C.afficher());


                }

                else
                {
                    QMessageBox::critical(nullptr, QObject::tr("Ajout produit"),
                                QObject::tr("ajout echoué.\n"
                                            "Click Cancel to exit."), QMessageBox::Cancel);
                }



}

void integ::on_pb_modifier_clicked()
{
    int id=ui->le_CIN->text().toInt();
        QString n=ui->le_NOM->text();
        QString p=ui->le_Prenom->text();
        QString A=ui->le_Adresse_mail->text();
        int a=ui->le_Age->text().toInt();

        Client C(id,n,p,A,a);
        bool test=C.modifier();

            QMessageBox msgBox;
                if(test){
                    msgBox.setText("modification avec succes");
                    ui->tab_client->setModel(C.afficher());
                }
                    else
                    msgBox.setText(("echec de modification"));

                    msgBox.exec();
}
void integ::mailSent(QString status)
{
    if(status == "Message sent")
        QMessageBox::warning( 0, tr( "Qt Simple SMTP client" ), tr( "Message sent!\n\n" ) );
}
void integ::on_pb_supp_clicked()
{
    Client C1;
        C1.set_id(ui->le_CIN_supp->text().toInt());
        bool test=C1.supprimer(C1.get_id());
        QMessageBox msgBox;
            if(test){
                msgBox.setText("suppresion avec succes");
                ui->tab_client->setModel(C.afficher());
            }
                else
                msgBox.setText(("echec de suppresion"));

                msgBox.exec();
}

void integ::on_pb_supp2_clicked()
{
    Client C1;
        C1.set_nom(ui->ln_supp2->text());
        bool test=C1.supprimer2(C1.get_nom());
        QMessageBox msgBox;
            if(test){
                msgBox.setText("suppresion avec succes");
                ui->tab_client->setModel(C.afficher());
            }
                else
                msgBox.setText(("echec de suppresion"));

                msgBox.exec();
}

void integ::on_pb_QR_code_clicked()
{
    int tabeq=ui->tab_client->currentIndex().row();
                    QVariant idd=ui->tab_client->model()->data(ui->tab_client->model()->index(tabeq,0));
                    QString idC= idd.toString();
                    QSqlQuery qry;
                    qry.prepare("select * from Gestion_client where idC=:idC");
                    qry.bindValue(":idC",idC);
                    qry.exec();
                    QString nom, prenom ,Adresse_mail,ide;
                    int Age;
                    while(qry.next()){
                        nom=qry.value(1).toString();
                        prenom=qry.value(2).toString();
                        Adresse_mail=qry.value(3).toString();

                    }
                    ide=QString(idC);
                    ide="idC: "+ide+" nom: "+nom+" prenom: "+prenom+" Adresse_mail: "+Adresse_mail+" Age: "+Age;
                    QrCode qr = QrCode::encodeText(ide.toUtf8().constData(), QrCode::Ecc::HIGH);

                    // Read the black & white pixels
                    QImage im(qr.getSize(),qr.getSize(), QImage::Format_RGB888);
                    for (int y = 0; y < qr.getSize(); y++) {
                        for (int x = 0; x < qr.getSize(); x++) {
                            int color = qr.getModule(x, y);  // 0 for white, 1 for black

                            // You need to modify this part
                            if(color==0)
                                im.setPixel(x, y,qRgb(254, 254, 254));
                            else
                                im.setPixel(x, y,qRgb(0, 0, 0));
                        }
                    }
                    im=im.scaled(200,200);
                    ui->qrlabel->setPixmap(QPixmap::fromImage(im));
                    int i=0 ;
                    for(i=0;i<100;i=i+0.1){
                        i++;
                        ui->progressBar->setValue(i);
                    }
}

void integ::on_pb_envoyer_mail_clicked()
{
    Smtp* smtp = new Smtp("jaouher.jaziri@esprit.tn", "201JMT4266", "smtp.gmail.com", 465);
     connect(smtp, SIGNAL(status(QString)), this, SLOT(mailSent(QString)));
     smtp->sendMail("jaouher.jaziri@esprit.com", ui->ln_envoyermail_to->text() , ui->ln_envoyermail_subject->text(),ui->plainTextEdit_email->toPlainText());

}

void integ::on_pb_rechercher_clicked()
{
    if(ui->checkBox_id->isChecked()){
        int id=ui->ln_rechercher_id->text().toInt();
        QSqlQueryModel* test=C.rechercher_id(id);
        QMessageBox msgBox;
            if(test){
                msgBox.setText("recherche avec succes");
                ui->tab_client->setModel(C.rechercher_id(id));
            }
                else
                msgBox.setText(("client introuvable"));

                msgBox.exec();
        }
        else if(ui->checkBox_nom->isChecked())
        {
           QString nom=ui->ln_recherche_nom->text();
           QSqlQueryModel* test2=C.rechercher_nom(nom);
           QMessageBox msgBox;
               if(test2){
                   msgBox.setText("recherche avec succes");
                   ui->tab_client->setModel(C.rechercher_nom(nom));
               }
                   else
                   msgBox.setText(("client introuvable"));

                   msgBox.exec();
        }
        else if(ui->checkBox_prenom->isChecked())
        {
           QString prenom=ui->ln_chercher_prenom->text();
           QSqlQueryModel* test2=C.rechercher_prenom(prenom);
           QMessageBox msgBox;
               if(test2){
                   msgBox.setText("recherche avec succes");
                   ui->tab_client->setModel(C.rechercher_prenom(prenom));
               }
                   else
                   msgBox.setText(("client introuvable"));

                   msgBox.exec();
        }
        else if((ui->checkBox_prenom->isChecked())&&(ui->checkBox_nom->isChecked()))
        {
            QString nom=ui->ln_recherche_nom->text();
           QString prenom=ui->ln_chercher_prenom->text();
           QSqlQueryModel* test2=C.rechercher_nomprenom(nom, prenom);
           QMessageBox msgBox;
               if(test2){
                   msgBox.setText("recherche avec succes");
                   ui->tab_client->setModel(C.rechercher_nomprenom(nom, prenom));
               }
                   else
                   msgBox.setText(("client introuvable"));

                   msgBox.exec();
        }
        else if((ui->checkBox_id->isChecked())&&(ui->checkBox_nom->isChecked()))
        {
            QString nom=ui->ln_recherche_nom->text();
           int id=ui->ln_rechercher_id->text().toInt();
           QSqlQueryModel* test2=C.rechercher_nomid(nom, id);
           QMessageBox msgBox;
               if(test2){
                   msgBox.setText("recherche avec succes");
                   ui->tab_client->setModel(C.rechercher_nomid(nom, id));
               }
                   else
                   msgBox.setText(("client introuvable"));

                   msgBox.exec();
        }
        else if((ui->checkBox_id->isChecked())&&(ui->checkBox_prenom->isChecked()))
        {
            QString prenom=ui->ln_chercher_prenom->text();
           int id=ui->ln_rechercher_id->text().toInt();
           QSqlQueryModel* test2=C.rechercher_prenomid(prenom, id);
           QMessageBox msgBox;
               if(test2){
                   msgBox.setText("recherche avec succes");
                   ui->tab_client->setModel(C.rechercher_prenomid(prenom, id));
               }
                   else
                   msgBox.setText(("client introuvable"));

                   msgBox.exec();
        }
        else if((ui->checkBox_id->isChecked())&&(ui->checkBox_prenom->isChecked())&&(ui->checkBox_nom->isChecked()))
        {
            QString nom=ui->ln_recherche_nom->text();
            QString prenom=ui->ln_chercher_prenom->text();
           int id=ui->ln_rechercher_id->text().toInt();
           QSqlQueryModel* test2=C.rechercher_prenom_id_nom(prenom, id,nom);
           QMessageBox msgBox;
               if(test2){
                   msgBox.setText("recherche avec succes");
                   ui->tab_client->setModel(C.rechercher_prenom_id_nom(prenom, id,nom));
               }
                   else
                   msgBox.setText(("client introuvable"));

                   msgBox.exec();
        }
}

void integ::on_tri_par_age_clicked()
{
    QString choix=ui->comboBox->currentText();
        if(choix=="Tri par age croissante"){
        QSqlQueryModel* test=C.triparAge();
        QMessageBox msgBox;
            if(test){
                msgBox.setText("tri avec succes");
                ui->tab_client->setModel(C.triparAge());
            }
                else
                msgBox.setText(("echec"));

                msgBox.exec();
        }
        else if(choix=="Tri par nom croissante")
        {
            QSqlQueryModel* test=C.triparNom();
            QMessageBox msgBox;
                if(test){
                    msgBox.setText("tri avec succes");
                    ui->tab_client->setModel(C.triparNom());
                }
                    else
                    msgBox.setText(("echec"));

                    msgBox.exec();
        }
        else if(choix=="Tri par prenom croissante")
        {
            QSqlQueryModel* test=C.triparPrenom();
            QMessageBox msgBox;
                if(test){
                    msgBox.setText("tri avec succes");
                    ui->tab_client->setModel(C.triparPrenom());
                }
                    else
                    msgBox.setText(("echec"));

                    msgBox.exec();
        }
        else if(choix=="Tri par age decroissante")
        {
            QSqlQueryModel* test=C.triparAgeD();
            QMessageBox msgBox;
                if(test){
                    msgBox.setText("tri avec succes");
                    ui->tab_client->setModel(C.triparAgeD());
                }
                    else
                    msgBox.setText(("echec"));

                    msgBox.exec();
        }
        else if(choix=="Tri par nom decroissante")
        {
            QSqlQueryModel* test=C.triparnomD();
            QMessageBox msgBox;
                if(test){
                    msgBox.setText("tri avec succes");
                    ui->tab_client->setModel(C.triparnomD());
                }
                    else
                    msgBox.setText(("echec"));

                    msgBox.exec();
        }
        else if(choix=="Tri par prenom decroissante")
        {
            QSqlQueryModel* test=C.triparPrenomD();
            QMessageBox msgBox;
                if(test){
                    msgBox.setText("tri avec succes");
                    ui->tab_client->setModel(C.triparPrenomD());
                }
                    else
                    msgBox.setText(("echec"));

                    msgBox.exec();
        }
}

void integ::on_tabWidget_2_currentChanged(int index)
{
    // set dark background gradient:
                      QLinearGradient gradient(0, 0, 0, 400);
                      gradient.setColorAt(0, QColor(90, 90, 90));
                      gradient.setColorAt(0.38, QColor(105, 105, 105));
                      gradient.setColorAt(1, QColor(70, 70, 70));
                      ui->plot->setBackground(QBrush(gradient));


                      // create empty bar chart objects:
                      QCPBars *amande = new QCPBars(ui->plot->xAxis, ui->plot->yAxis);
                      amande->setAntialiased(false);
                      amande->setStackingGap(1);
                       //set names and colors:
                      amande->setName("Repartition des client selon age ");
                      amande->setPen(QPen(QColor(0, 168, 140).lighter(130)));
                      amande->setBrush(QColor(0, 168, 140));
                      // stack bars on top of each other:

                      // prepare x axis with country labels:
                      QVector<double> ticks;
                      QVector<QString> labels;
                      ticks << 1 << 2 << 3 << 4 << 5;
                      labels << "[5..15]" << "[15..25]" << "[25..35]" << "[35..45]" << "[45...]" ;

                      QSharedPointer<QCPAxisTickerText> textTicker(new QCPAxisTickerText);
                      textTicker->addTicks(ticks, labels);
                      ui->plot->xAxis->setTicker(textTicker);
                      ui->plot->xAxis->setTickLabelRotation(60);
                      ui->plot->xAxis->setSubTicks(false);
                      ui->plot->xAxis->setTickLength(0, 4);
                      ui->plot->xAxis->setRange(0, 8);
                      ui->plot->xAxis->setBasePen(QPen(Qt::white));
                      ui->plot->xAxis->setTickPen(QPen(Qt::white));
                      ui->plot->xAxis->grid()->setVisible(true);
                      ui->plot->xAxis->grid()->setPen(QPen(QColor(130, 130, 130), 0, Qt::DotLine));
                      ui->plot->xAxis->setTickLabelColor(Qt::white);
                      ui->plot->xAxis->setLabelColor(Qt::white);

                      // prepare y axis:
                      ui->plot->yAxis->setRange(0,10);
                      ui->plot->yAxis->setPadding(5); // a bit more space to the left border
                      ui->plot->yAxis->setLabel("Statistiques");
                      ui->plot->yAxis->setBasePen(QPen(Qt::white));
                      ui->plot->yAxis->setTickPen(QPen(Qt::white));
                      ui->plot->yAxis->setSubTickPen(QPen(Qt::white));
                      ui->plot->yAxis->grid()->setSubGridVisible(true);
                      ui->plot->yAxis->setTickLabelColor(Qt::white);
                      ui->plot->yAxis->setLabelColor(Qt::white);
                      ui->plot->yAxis->grid()->setPen(QPen(QColor(130, 130, 130), 0, Qt::SolidLine));
                      ui->plot->yAxis->grid()->setSubGridPen(QPen(QColor(130, 130, 130), 0, Qt::DotLine));

                      // Add data:

                      QVector<double> PlaceData;
                      QSqlQuery q1("select Age from Gestion_client");
                      C.statistique(&PlaceData);
                      C.statistique_1(&PlaceData);
                      C.statistique_2(&PlaceData);
                      C.statistique_3(&PlaceData);
                      C.statistique_4(&PlaceData);
                      amande->setData(ticks, PlaceData);
                      // setup legend:
                      ui->plot->legend->setVisible(true);
                      ui->plot->axisRect()->insetLayout()->setInsetAlignment(0, Qt::AlignTop|Qt::AlignHCenter);
                      ui->plot->legend->setBrush(QColor(255, 255, 255, 100));
                      ui->plot->legend->setBorderPen(Qt::NoPen);
                      QFont legendFont = font();
                      legendFont.setPointSize(5);//888//
                      ui->plot->legend->setFont(legendFont);
                      ui->plot->setInteractions(QCP::iRangeDrag | QCP::iRangeZoom);
}

