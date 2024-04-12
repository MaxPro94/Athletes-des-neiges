class progressBar {
    constructor(element, barre, niveau1, niveau2, niveau3){
        this.element = element,
        this.barre = barre,
        this.niveau1 = niveau1,
        this.niveau2 = niveau2,
        this.niveau3 = niveau3
    }
}


function ProgressBar(progressBar){

    progressBar.element.addEventListener("input", function(e){
        if(progressBar.niveau1.test(progressBar.element.value) == true){
            width = 33
            bar.style.width = width + "%"
            bar.innerHTML = "Acceptable"
        }
    
        if(progressBar.niveau2.test(progressBar.element.value) == true){
            width = 66
            progressBar.barre.style.width = width + "%"
            progressBar.barre.classList.remove('bg-danger');
            progressBar.barre.classList.add('bg-warning');
            progressBar.barre.innerHTML = "Moyen"
        } 
    
        if(progressBar.niveau3.test(progressBar.element.value) == true){
            width = 100
            progressBar.barre.style.width = width + "%"
            progressBar.barre.classList.remove('bg-warning');
            progressBar.barre.classList.add('bg-success');
            progressBar.barre.innerHTML = "Fort"
        } 
    
    })

}