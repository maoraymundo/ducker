import { Component } from '@angular/core';

@Component({
  selector: 'my-app',
  templateUrl: './app.component.html'
})
export class AppComponent  { 
    text: string = 'Sample code';
    preview: boolean = false;

    previewContent(e) {
        e.preventDefault();
        this.preview = true;
    }
}
