#ifndef INTEG_H
#define INTEG_H
#include <QSystemTrayIcon>
#include <QDialog>
#include <QTcpSocket>
#include "client.h"
#include <QFile>
#include<QTextStream>

namespace Ui {
class integ;
}
class QSystemTrayIcon;
class integ : public QDialog
{
    Q_OBJECT

public:
    explicit integ(QWidget *parent = nullptr);
    ~integ();

private slots:
    void on_pb_ajouter_clicked();

    void on_pb_modifier_clicked();

    void on_pb_supp_clicked();

    void on_pb_supp2_clicked();

    void on_pb_QR_code_clicked();

    void on_pb_envoyer_mail_clicked();
    void mailSent(QString);

    void on_pb_rechercher_clicked();

    void on_tri_par_age_clicked();

    void on_tabWidget_2_currentChanged(int index);

    

private:
    Ui::integ *ui;
    Client C;


};

#endif // INTEG_H
