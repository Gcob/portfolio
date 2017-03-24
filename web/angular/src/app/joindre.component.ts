import { Component, OnInit  } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { Observable } from 'rxjs/Observable';
import { Response } from '@angular/http';
import { ContentService } from './content.service';



@Component({
  selector: 'joindre',
  templateUrl: 'html/joindre.component.html',
  providers: [ContentService]
})
export class JoindreComponent  {
    text = {};
    isLoading = true;
    actionUrl = "/hey";

    constructor(private _contentService: ContentService, private _route: ActivatedRoute) {}

    ngOnInit() {
        var lang:string = this._route.snapshot.data['locale'];
        var texts = this._contentService.loadPageContent(lang, 'joindre');
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
            this.text = this._contentService.loadPageContentFromCache(lang, 'joindre');
            this.isLoading = false;
         }

        
    }
}
