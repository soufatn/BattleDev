
//***************************************************************
//*
//*
//* SOLUTION BY Storm_3
//*
//*
//******************************************************************

var input = [];

readline_object.on("line", (value) => { //Read input values
	input.push(value);
})
//Call ContestResponse when all inputs are red
readline_object.on("close", ContestResponse); 


function ContestResponse(){
	//implements your code here using input array
	var prixParPersonne = parseInt(input[0]);
	var N = parseInt(input[1]);
	
	var totalVente = 0;
	
	for(var i = 2; i < N+2; i++) {
	    var nbP = parseInt(input[i]);
	    
	    var prix = nbP * prixParPersonne;
	    
	    if(nbP >= 10)
	        prix *= 0.70;
	    else if (nbP >= 6)
	        prix *= 0.80;
	    else if (nbP >= 4)
	        prix *= 0.90;
	        
	    totalVente += prix;
	}
	
	console.log(Math.ceil(totalVente));
}
