#ifndef INTEG_FINALE_H
#define INTEG_FINALE_H
#include "client.h"
#include "smtp.h"
#include <QMainWindow>
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
#include <QDialog>
#include<QLineEdit>
#include <QDebug>
#include <QFile>
namespace Ui {
class integ_finale;
}

class integ_finale : public QMainWindow
{
    Q_OBJECT

public:
    explicit integ_finale(QWidget *parent = nullptr);
    ~integ_finale();

private:
    Ui::integ_finale *ui;
    Client C;
};

#endif // INTEG_FINALE_H
