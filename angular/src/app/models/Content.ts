export class Content {
    public id: number;
    public name: string;
    public body: string;
    public url: string;
    public sub_id: number;
    public enabled: boolean;
    public sort: number;

    constructor(data: any) {
        this.id = data.id;
        this.name = data.name;
        this.body = data.body;
        this.url = data.url;
        this.sub_id = data.sub_id;
        this.enabled = data.enabled;
        this.sort = data.sort;
    }
}