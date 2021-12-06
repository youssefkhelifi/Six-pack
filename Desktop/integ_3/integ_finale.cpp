#include "integ_finale.h"
#include "ui_integ_finale.h"

integ_finale::integ_finale(QWidget *parent) :
    QMainWindow(parent),
    ui(new Ui::integ_finale)
{
    ui->setupUi(this);
}

integ_finale::~integ_finale()
{
    delete ui;
}
