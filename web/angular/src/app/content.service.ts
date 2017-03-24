import { Injectable } from '@angular/core';
import { Http, Response } from '@angular/http';
import { Observable } from 'rxjs/Observable';
import 'rxjs/add/operator/map';
import 'rxjs/add/operator/catch';
import { Text } from './text';

@Injectable()
export class ContentService {
    private pageContentUrl:string = 'http://localhost/portfolio/web/app_dev.php/page-content/';
    static Texts = {fr: {}, en: {}};

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
            return new Observable(observer => {
                observer.next(ContentService.Texts[locale][pageName]);
            });
        }

        
    }
}
