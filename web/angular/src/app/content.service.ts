import { Injectable } from '@angular/core';
import { Http, Response } from '@angular/http';
import { Observable } from 'rxjs/Observable';
import 'rxjs/add/operator/map';
import 'rxjs/add/operator/catch';
import { Projet } from './Projet';

@Injectable()
export class ContentService {
    private pageContentUrl:string = 'http://localhost/portfolio/web/app_dev.php/page-content/';
    private projectsContentUrl:string = 'http://localhost/portfolio/web/app_dev.php/projets/';

    static Texts = {fr: {}, en: {}};
    static Projets = {fr: {}, en: {}};

    constructor(private _http: Http) {}

    loadPageContent(locale: string, pageName: string){
        var url:string = this.pageContentUrl + locale + "/" + pageName;

        if(ContentService.Texts[locale][pageName] == undefined)
        {
            return this._http.get(url).map( (res:Response) => {
                ContentService.Texts[locale][pageName] = res.json();
                return ContentService.Texts[locale][pageName];
            });  
        }
        else
        {
            return false;
        }
    }

    loadPageContentFromCache (locale: string, pageName: string)
    {
        if(ContentService.Texts[locale][pageName] != undefined)
        {
            return ContentService.Texts[locale][pageName];
        }
        else
        {
            return  false;
        }
    }




    getProjects(locale: string){
        var url2:string = this.projectsContentUrl + locale;
       
        if(Object.keys(ContentService.Projets[locale]).length == 0)
        {
            return this._http.get(url2).map( (res:Response) => {
                ContentService.Projets[locale] = res.json();
                return ContentService.Projets[locale];
            });  
        }
        else
        {
            return false;
        }
    }

    getProjectsFromCache (locale: string)
    {
        if(ContentService.Projets[locale] != undefined)
        {
            return ContentService.Projets[locale];
        }
        else
        {
            return  false;
        }
    }
}
