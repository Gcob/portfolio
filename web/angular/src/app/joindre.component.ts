import { Component, OnInit  } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { Observable } from 'rxjs/Observable';
import { Response } from '@angular/http';
import { ContentService } from './content.service';

import { Text } from './text';


@Component({
  selector: 'joindre',
  templateUrl: 'html/joindre.component.html',
  providers: [ContentService]
})
export class JoindreComponent  {
    text = {};
    isLoading = true;
    lat: number = 51.678418;
    lng: number = 7.809007;

    constructor(private _contentService: ContentService, private _route: ActivatedRoute) {}

    ngOnInit() {
        var lang:string = this._route.snapshot.data['locale'];
        this._contentService.loadPageContent(lang, 'joindre')
            .subscribe(res => {
                this.text = res;
                this.isLoading = false;
            })
        ;

    }
}
