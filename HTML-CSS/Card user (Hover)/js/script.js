window.onload = () => {
    let Data = [{
        "fullname": "Todoroki",
        "img": "img/Todoroki.jpg",
        "bio": "Never forget who you want to become."
    }, {
        "fullname": "Oreki",
        "img": "img/Oreki.jpg",
        "bio": "Day by day, my mental heaith is getting fucked up."
    }, {
        "fullname": "Midoriya",
        "img": "img/Midoriya.jpg",
        "bio": "All men are not created equal."
    }, {
        "fullname": "Obanai",
        "img": "img/Obanai.jpg"
    }, {
        "fullname": "ZuShi",
        "img": "img/ZuShi.jpg",
        "bio": "There are two things you have to say no matter what..."
    }, {
        "fullname": "Meliodas",
        "img": "img/Meliodas.jpg",
        "bio": "I don't have a choice. you hurt someone important to me. that is your sin!"
    }, {
        "fullname": "Gilbert",
        "img": "img/Gilbert.jpg",
        "bio": "Live and be free..."
    }];
    Data.forEach(item => {
          document.querySelector(".content").innerHTML +=
          `
            <div class="card">
                <div class="card-header">
                    <img src="${item.img}" alt="image of ${item.fullname}" srcset="">
                </div>
                <div class="card-body">
                    <h2>${item.fullname}</h2>
                    <div class="desc">${item.bio}</div>
                </div>
            </div>`;
        
      });
          const colorThief = new ColorThief();
          const cards = document.querySelectorAll(".content .card");
          cards.forEach(card =>{
            let image = card.querySelector("img");
            image.addEventListener("load", ()=> {
                let color = colorThief.getColor(image);
                    image.style.boxShadow = `-1px 1px 11px 6px rgb(${color[0]},${color[1]},${color[2]})`;
                    image.style.border = `rgb(${color[0]},${color[1]},${color[2]})`;
                });
          })

}