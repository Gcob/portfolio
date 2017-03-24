import { Component, OnInit  } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { Observable } from 'rxjs/Observable';
import { Response } from '@angular/http';
import { ContentService } from './content.service';

import { Text } from './text';



@Component({
  selector: 'home',
  templateUrl: 'html/home.component.html',
  providers: [ContentService]
})
export class HomeComponent implements OnInit  {
    text = {};
    isLoading = true;

    constructor(private _contentService: ContentService, private _route: ActivatedRoute) {}

    ngOnInit() {
        var lang:string = this._route.snapshot.data['locale'];
        this._contentService.loadPageContent(lang, 'home')
            .subscribe(res => {
                this.text = res;
                this.isLoading = false;
            })
        ;

    }
}
