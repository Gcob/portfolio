export class Text {
    private text:Object;

    constructor() 
    {
        this.text = {};
    }

    setAllText (allText:Object)
    {
        this.text = allText;
    }

    addText (key:string, content:string)
    {
        this.text[key] = content;
    }

    getText(varname:string)
    {
        if(this.text.hasOwnProperty(varname))
        {
             return this.text[varname];
        }

        return "no text found for '"+varname+"'";
    }
}