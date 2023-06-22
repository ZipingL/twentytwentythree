document.addEventListener("DOMContentLoaded", function () {

    const t = new XMLHttpRequest();
    t.open("POST", "https://liu.academy/api/awsuni"),
        t.setRequestHeader("Content-Type", "application/json"),
        t.setRequestHeader("Accept", "application/json"),
        t.setRequestHeader("X-Requested-With", "XMLHttpRequest");

    const a = document.getElementById('traffical');




    t.onreadystatechange = function () {
        if (4 === this.readyState && 200 === this.status) {


            const a = document.getElementById('traffical');

            console.info('Today may be a day of a better period shown');

            if (a) {
                a.innerHTML = `<div style="margin:0; padding-top:1rem;display:flex; justify-content:space-between;max-width:inherit;"><div style="display:inline-block; text-align:left;">🔥💡 within Phase 5</div> <div style="display:inline-block; text-align:justify;">${JSON.parse(this.response).views?.month} </div> </div>`;
            }




        }
    }



    const payloader = {};
    if (document.querySelector('#post-meta')) {
        payloader['ID'] = document.querySelector("#post-meta > span.ID")?.innerText;
        payloader['title'] = document.querySelector("#post-meta > span.title")?.innerText;
        payloader['permalink'] = document.querySelector("#post-meta > span.permalink")?.innerText;
        payloader['author'] = document.querySelector("#post-meta > span.author")?.innerText;
        payloader['thumbnail'] = document.querySelector("#post-meta > span.thumbnail")?.innerText;
        payloader['excerpt'] = document.querySelector("#post-meta > span.excerpt")?.innerText;
        payloader['date'] =  new Date().getTime();
        payloader['category'] = document.querySelector("#post-meta > span.category")?.innerText;
        payloader['tags'] = document.querySelector("#post-meta > span.tags")?.innerText;
    }


    t.send(JSON.stringify(
        {

            "date_local": (new Date()).getTime(),
            "path": window.location.pathname,
            "meta":
                payloader
        }
    ));

});