import { Component, OnInit  } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { Observable } from 'rxjs/Observable';
import { Response } from '@angular/http';
import { ContentService } from './content.service';
import 'rxjs/add/observable/forkJoin';

import { Projet } from './projet';

@Component({
  selector: 'projet',
  templateUrl: 'html/projets.component.html',
  providers: [ContentService]
})
export class ProjetsComponent implements OnInit  {
    text:object = {};
    isLoading:boolean = true;
    locale:string;
    projets:Projet[];

    constructor(private _contentService: ContentService, private _route: ActivatedRoute) {}


    ngOnInit() {
        this.projets = [
            {
                id: 0,
                url: '',
                title: '...',
                title_en: '...',
                image: 'placeholder.jpg',
                description: '',
                description_en: ''
            },
            {
                id: 0,
                url: '',
                title: '...',
                title_en: '...',
                image: 'placeholder.jpg',
                description: '',
                description_en: ''
            },
            {
                id: 0,
                url: '',
                title: '...',
                title_en: '...',
                image: 'placeholder.jpg',
                description: '',
                description_en: ''
            }
        ];
 
        var lang:string = this._route.snapshot.data['locale'];
        this.locale = lang;

         var projetsObs = this._contentService.getProjects(lang);
         console.log(projetsObs);
         if(projetsObs)
         {
             
             projetsObs.subscribe(
                    res => {
                        this.projets = res;
                        this.isLoading = false;
                    }
            );
         }
         else
         {
             this.projets = this._contentService.getProjectsFromCache(lang);
         }
       
         var texts = this._contentService.loadPageContent(lang, 'projets');
         if(texts)
         {
            texts.subscribe(
                res2 => {
                    this.text = res2;
                    this.isLoading = false;
                }
            );
         }
         else
         {
            this.text = this._contentService.loadPageContentFromCache(lang, 'projets');
            this.isLoading = false;
         }
            


        /*
        Observable.forkJoin(
            this._contentService.loadPageContent(lang, 'projets'), 
            this._contentService.getProjects(lang)
        )
        .subscribe(
            res => {
                this.text = res[0];
                this.projets = res[1];
                this.isLoading = false;
            }
        );
*/
    }
}
