import {Component, OnInit} from "@angular/core";
import {Router} from "@angular/router";
import {ContentService} from "../../services/content.service";
import {Content} from "../../models/Content";

@Component({
    templateUrl: "app/view/content/content-create-edit.html",
    providers: [ContentService]
})
export class ContentCreateComponent implements OnInit {
    public title = "Crear un nuevo restaurante";
    public item: Content;
    public error;

    constructor(private _contentService: ContentService,
                private _router: Router) {
    }

    onSubmit() {
        this._contentService.create(this.item)
            .subscribe(
                result => {
                    this.item = result;
                    this._router.navigate(['ContentIndex']);
                },
                error => {
                    alert("Error al añadir restaurante " + error.status);
                    this.error = <any>error;
                    // console.error("ERROR: " + error.status);
                    // console.info("INFORMACION DEL ERROR");
                    // console.info(error._body);
                }
            );
    }

    ngOnInit() {
        this.item = new Content({});
    }
}