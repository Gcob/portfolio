
import { Component, OnInit  } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { Observable } from 'rxjs/Observable';
import { Response } from '@angular/http';
import { ContentService } from './content.service';




@Component({
  selector: 'apropos',
  templateUrl: 'html/apropos.component.html',
  providers: [ContentService]
})
export class AproposComponent implements OnInit  {
    text = {};
    isLoading = true;

    constructor(private _contentService: ContentService, private _route: ActivatedRoute) {}

    ngOnInit() {
        var lang:string = this._route.snapshot.data['locale'];
        var texts = this._contentService.loadPageContent(lang, 'apropos');
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
            this.text = this._contentService.loadPageContentFromCache(lang, 'apropos');
            this.isLoading = false;
         }

    }
}
