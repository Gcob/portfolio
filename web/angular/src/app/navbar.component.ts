import { Component, HostListener } from '@angular/core';
import { Inject } from "@angular/core";
import { DOCUMENT } from "@angular/platform-browser";

@Component({
  selector: 'navbar',
  templateUrl: 'html/navbar.component.html'
})

export class NavBarComponent  {
  public navIsFixed: boolean = false;

constructor(@Inject(DOCUMENT) private document: Document) { }

  @HostListener("window:scroll", [])
  onWindowScroll() {
    let number = this.document.body.scrollTop;
    if (number > 1) {
      this.navIsFixed = true;
    } else if (this.navIsFixed && number < 1) {
      this.navIsFixed = false;
    }
  }
}
