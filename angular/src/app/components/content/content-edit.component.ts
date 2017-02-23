import {Component, OnInit} from "@angular/core";
import {Router} from "@angular/router";
import {ContentService} from "../../services/content.service";
import {BaseComponent} from "../base.component";

@Component({
    templateUrl: "app/view/content/content-create-edit.html",
    providers: [ContentService]
})
export class ContentEditComponent extends BaseComponent implements OnInit {
    public title;

    constructor(private _service: ContentService,
                private _router: Router) {
        super(_service, _router);
    }

    onSubmit() {
        this._service.update(this.item).subscribe(
            result => {
                this.item = result;
                this._router.navigate(['ContentIndex', {id: result.id}]);
            },
            error => {
                this.error = <any>error;
                this._router.navigate(['ContentIndex']);
                // console.error("ERROR: " + error.status);
                // console.info("INFORMACION DEL ERROR");
                // console.info(error._body);
            }
        );
    }

    ngOnInit() {
        this.item = {};
        this.getById(1);
    }
}