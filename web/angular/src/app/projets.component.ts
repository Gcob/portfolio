import { Component, OnInit  } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { Observable } from 'rxjs/Observable';
import { Response } from '@angular/http';
import { ContentService } from './content.service';

import { Projet } from './projet';

@Component({
  selector: 'projet',
  templateUrl: 'html/projets.component.html',
  providers: [ContentService]
})
export class ProjetsComponent implements OnInit  {
    text = {};
    isLoading = true;
    projets:Projet[] = [
        {
            id: 0,
            url: '',
            title: '...',
            image: 'placeholder.jpg',
            description: ''
        },
        {
            id: 0,
            url: '',
            title: '...',
            image: 'placeholder.jpg',
            description: ''
        },
        {
            id: 0,
            url: '',
            title: '...',
            image: 'placeholder.jpg',
            description: ''
        },
    ];

    constructor(private _contentService: ContentService, private _route: ActivatedRoute) {}

    ngOnInit() {
        var lang:string = this._route.snapshot.data['locale'];
        this._contentService.loadPageContent(lang, 'projets')
            .subscribe(res => {
                this.text = res;
                this.isLoading = false;
            })
        ;
        this._contentService.getProjects(lang)
            .subscribe(res => {
                this.projets = res;
            })
        ;

    }
}
