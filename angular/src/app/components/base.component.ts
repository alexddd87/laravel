export class BaseComponent {
    protected service;
    protected item;
    protected items;
    protected router;
    protected error;
    protected loading;
    protected confirmDelete;

    constructor(service, router) {
        this.service = service;
        this.router = router;
    }

    getById(id: number) {
        this.service.show(id)
            .subscribe(
                res => {
                    this.item = res;
                },
                error => {
                    this.error = <any>error;
                    this.router.navigate(['Home']);
                    // console.error("ERROR: " + error.status);
                    // console.info("INFORMACION DEL ERROR");
                    // console.info(error._body);
                });

    }

    getAll() {
        this.service.index()
            .subscribe(
                result => {
                    this.items = result;
                    if (result === undefined) {

                    }
                    this.loading = false;
                },
                error => {
                    this.error = <any>error;
                    if (error.status === 200) {
                        error.status = 401;
                    }
                    // console.error("ERROR: " + error.status);
                    // console.info(error._body);
                }
            );
    }

    onDelete(id: number) {
        this.confirmDelete = id;
    }

    confirmedDelete() {
        this.loading = true;
        this.service.destroy(this.confirmDelete).subscribe(
            () => {
                this.getAll();
            }, error => {
                // console.error("ERROR: " + error.status);
                // console.info(error._body);
            }
        );
        this.confirmDelete = null;
    }
}