import { Component, HostListener, OnInit } from '@angular/core';
import { Inject } from "@angular/core";
import { DOCUMENT } from "@angular/platform-browser";
import { Router } from '@angular/router';

@Component({
  selector: 'navbar',
  templateUrl: 'html/navbar.component.html'
})

export class NavBarComponent implements OnInit  {
  public navIsFixed: boolean = false;

constructor(@Inject(DOCUMENT) private document: Document, private _router: Router) { }

  @HostListener("window:scroll", [])
  onWindowScroll() {
    let number = this.document.body.scrollTop;
    if (number > 1) {
      this.navIsFixed = true;
    } else if (this.navIsFixed && number < 1) {
      this.navIsFixed = false;
    }
  }

  pageUrl(lang)
  {
    return '/' + lang + this._router.url.slice(3);
  }

  ngOnInit() {
   
  }
}
