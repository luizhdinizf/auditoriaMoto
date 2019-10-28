# -*- coding: utf-8 -*-
"""
Created on Thu Aug  8 12:54:00 2019

@author: 20004411
"""
#encoding: utf-8
from yattag import Doc,indent
import csv
import re
import unidecode
import os
from os import listdir
from os.path import isfile, join    
import codecs
from reloadr import autoreload



@autoreload
def geraCabecalhoYazaki():  
    file = open(path_base+'template/cabecalhoYazaki.html','r',encoding = "utf-8")
    data = file.read() 
    return data
@autoreload
def geraHtmlHeader():  
    file = open(path_base+'template/header.html','r',encoding = "utf-8")
    data = file.read() 
    return data
@autoreload
def geraLoadSave():
    file = open(path_base+'template/load_save.html','r',encoding = "utf-8")
    data = file.read() 
    return data
    
@autoreload
def generate_input_text(title,texto):
    doc, tag, text = Doc().tagtext()  
    with tag('div',klass="form-group"):
        with tag('label',('for', title),klass="col-md-4 control-label"):
            text(texto)
        with tag('div', klass="col-md-4"):
            doc.stag('input', id=title, name=title, type="text", placeholder=title, klass="form-control input-md", required="")
    doc.stag('hr')
    pagina=indent(doc.getvalue())
    return pagina
@autoreload
def generate_h_radio(title,radios,question):
    doc, tag, text = Doc().tagtext()  
    with tag('div',klass="form-group"):
        with tag('label',('for', title),klass="col-md-4 control-label"):
            text(question)
        with tag('div',klass="col-md-4"):
            for idx,radio in enumerate(radios):            
                with tag('label',('for', title+'-'+str(idx)),klass="radio-inline"):
                    with tag ('input', type="radio", name=title, id=title+'-'+str(idx) ,value=radio, checked="checked"):
                        text(radio)
    doc.stag('hr')      
    pagina=doc.getvalue()
    return pagina
@autoreload
def generate_check_moto(title,question):
    radios=['Ok','Ng','Na']
    doc, tag, text = Doc().tagtext()  
    with tag('div',klass="form-group"):
        with tag('label',('for', title),klass="col-md-4 control-label"):
            text(question)
        with tag('div',klass="col-md-4"):
            for idx,radio in enumerate(radios):            
                with tag('label',('for', title+'-'+str(idx)),klass="radio-inline"):             
                    with tag ('input', type="radio", name=title, id=title+'-'+str(idx) ,value=radio, checked="checked"):
                        text(radio)
                   
            with tag('label',('for', title+'-desc')):
                    doc.stag ('input', id= title+'-desc', name=title+'-desc', type="text", placeholder='Comentário', klass="form-control input-md")
    doc.stag('hr')              
    pagina=doc.getvalue()
    return pagina
@autoreload
def generate_check_mpps(title,question):
    radios=['A','B','C','D','E']
    doc, tag, text = Doc().tagtext()  
    with tag('div',klass="form-group"):
        with tag('label',('for', title),klass="col-md-4 control-label"):
            text(question)
        with tag('div',klass="col-md-4"):
            for idx,radio in enumerate(radios):            
                with tag('label',('for', title+'-'+str(idx)),klass="radio-inline"):             
                    with tag ('input', type="radio", name=title, id=title+'-'+str(idx) ,value=radio, checked="checked"):
                        text(radio)
                   
            with tag('label',('for', title+'-desc')):
                    doc.stag ('input', id= title+'-desc', name=title+'-desc', type="text", placeholder='Comentário', klass="form-control input-md")
    doc.stag('hr')              
    pagina=doc.getvalue()
    return pagina
@autoreload
def generate_check_manutencao(title,question):
    radios=['Normal','Irregular','Pendência','Regularizado','Pendência Regularizada']
    doc, tag, text = Doc().tagtext()  
    with tag('div',klass="form-group"):
        with tag('label',('for', title),klass="col-md-4 control-label"):
            text(question)
        with tag('div',klass="col-md-4"):
            for idx,radio in enumerate(radios):            
                with tag('label',('for', title+'-'+str(idx)),klass="radio-inline"):
                    with tag ('input', type="radio", name=title, id=title+'-'+str(idx) ,value=radio):
                        text(radio)
            
    doc.stag('hr')              
    pagina=doc.getvalue()
    return pagina


@autoreload
def generate_textbox(title,texto):
    doc, tag, text = Doc().tagtext()  
    with tag('div',klass="form-group"):
        with tag('label',('for', title),klass="col-md-4 control-label"):
            text(texto)
        with tag('div', klass="col-md-4"):
            with tag('textarea', klass="form-control", id=title, name=title):
                None
    pagina=indent(doc.getvalue())
    return pagina
@autoreload
def generate_subtitle(subtitle):
    doc, tag, text = Doc().tagtext()  
    doc._append("<br/>")
    doc._append("<br/>")
    doc._append("<br/>")
    doc._append("<br/>")
    with tag("legend"):
                        text(subtitle)  
    pagina=indent(doc.getvalue())
    return pagina
@autoreload
def generate_cabecalho_moto():
    dados_title = ['dep_auditor','auditor','local']
    dados_text = ['Departamento do Auditor','Auditor','Linha/Local']
    doc, tag, text = Doc().tagtext()  
    for title,texto in zip(dados_title,dados_text):
        with tag('div',klass="form-group"):
            with tag('label',('for', title),klass="col-md-4 control-label"):
                text(texto)
            with tag('div', klass="col-md-4"):
                doc.stag('input', id=title, name=title, type="text", placeholder=title, klass="form-control input-md", required="")
    doc.stag('hr') 
    pagina=indent(doc.getvalue())
    print(pagina)
    return pagina

@autoreload
def gera_index(paginas,path):
    doc, tag, text = Doc().tagtext()
    file = open(path+'index.html','w',encoding = "utf-8")  
    with tag('html'):
        doc.asis(geraHtmlHeader())
        with tag('body',style="margin:0px;padding:0px;overflow:hidden"):
            doc.asis(geraCabecalhoYazaki())
            with tag('div', klass="list-group"):
                for pagina in paginas:
                    with tag('a' ,href='./'+formatar(pagina),klass="list-group-item list-group-item-action"):
                        text(pagina)
                    #gera_form(pagina)
            with tag('a', klass="btn btn-primary", href="../upload", role="button"):
                     text('Upload')
    webpage=indent(doc.getvalue())
    file.write(webpage)
    file.close()

@autoreload    
def formatar(string):
    formatada = string.replace(" ", "_")
    re.sub('[^A-Za-z0-9]+', '', formatada)
    formatada = unidecode.unidecode(formatada)
    return formatada
    
    
@autoreload
def gera_form_automatico(titulo,campos,path,tipo_form):
    doc, tag, text = Doc().tagtext()
    file = open(path+formatar(titulo)+'.html','w',encoding = "utf-8")     
    with tag('html'):       
        with tag('html'):
            doc.asis(geraHtmlHeader())
        with tag('body',style="margin:0px;padding:0px;align:center",onload="carregar()"):
            with tag('form', klass="form-horizontal", action="../api/envio.php", method="post", name="f1"):
                with tag('fieldset'):                        
                    with tag("legend"):
                        text(titulo)   
                    doc.stag('input', type="hidden", id=titulo, name="titulo", value=formatar(titulo))
                    if tipo_form == 'moto':
                        doc.asis(generate_cabecalho_moto())
                    for campo in campos:      
                        campo = [i for i in campo if i] 
                       # print(campo)
                        if campo[1] == 'texto':
                            # print(campo)
                            pergunta=campo[0]
                            variavel=campo[2]                              
                            doc.asis(generate_input_text(variavel,pergunta))
                        if campo[1] == 'check':
                            radios=campo[3:]
                            variavel=campo[2]
                            pergunta=campo[0]
                            doc.asis(generate_h_radio(variavel,radios,pergunta))
                        if campo[1] == 'check_moto':
                            radios=campo[3:]
                            variavel=campo[2]
                            pergunta=campo[0]
                            doc.asis(generate_check_moto(variavel,pergunta))    
                        if campo[1] == 'check_mpps':
                            radios=campo[3:]
                            variavel=campo[2]
                            pergunta=campo[0]
                            doc.asis(generate_check_mpps(variavel,pergunta))   
                        if campo[1] == 'check_manutencao':
                            radios=campo[3:]
                            variavel=campo[2]
                            pergunta=campo[0]
                            doc.asis(generate_check_manutencao(variavel,pergunta))  
                        if campo[1] == 'subtitulo':                         
                            texto=campo[0]
                            doc.asis(generate_subtitle(texto))                          
                
                
                doc.asis(geraLoadSave())
                with tag('button', klass="btn btn-primary", type="submit"):
                    text("Enviar")
                
    pagina=indent(doc.getvalue())
    #print(pagina)
    print(path)
    file.write(pagina)
    file.close()

@autoreload
def inicia():
    path_base = "/html/" 
    path_csv = path_base + 'upload/uploaded_files/'
    os.chdir(path_base)
    print("Start")

    while 1:
            path = path_base
        #try:
            if isfile(path_csv+'form.csv'):
                print("Novo arquivo encontrado, iniciando Processamento")
                with codecs.open(path_csv+'form.csv', 'rb', encoding="latin-1") as csvfile:
                    readCSV = csv.reader(csvfile, delimiter=';')
                    campos=[]
                    for row in readCSV:
                        if row[0] == '':
                            continue
                        elif row[1] == 'titulo':
                            titulo = row[0]   
                        elif row[1] == 'tipo':
                            tipo=row[0]   
                            path = path+tipo+"/"      
                        else:
                            campos.append(row)
                
                    print(tipo)
                    gera_form_automatico(titulo,campos,path,tipo)
                print ("1")
                
            
        
            
                
                htmls = [f for f in listdir(path) if isfile(join(path, f))and f[-4:] =="html" and f != "index.html"]
                #gera_index(htmls,path)
                os.remove(path_csv+'form.csv')
                print ("Processamento Finalizado, arquivo removido")
    # except:
            #   print('erro')

    #gera_index(paginas)


inicia()