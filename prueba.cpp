#include <iostream>
#include <vector>

using namespace std;

int sumar(vector<int>,int ,int );
int main(){
	int n,repeticion,indice,suma,i,senial=0;
	vector<int> num;
	cin >>n;
	num.resize(n);
	for(i=0; i < n; i++){
		cin >> num[i];
	}
	//(cin >> indice>>repeticion;
	//~ for(i=0; i < n; i++){	
		//~ inc=i;
	//~ while(---){
		//~ if(j==i){
			//~ suma+=nume[i];
		//~ }else{
			//~ if(indice+repeticiones <= num)
				//~ suma+= sumar(num,inc,repeticion);
		//~ }
	//~ }
	//~ }
	indice=2;
	repeticion=2;
	//~ for(i = 0 ; i < n ; i++){
		//~ indice = i;
		//~ repeticion=2;
		while(repeticion+indice <= n){
			if(senial==1){
				//~ cout <<"Entro al bucle"<<endl;
				cout <<indice<<" "<<repeticion<<endl;
				suma+=sumar(num,indice,repeticion);
				indice=indice+repeticion;
				repeticion++;
			}else{
				suma+=num[1];
				senial=1;
			}
		}
		//~ cout <<"suma="<< suma << endl; 
		//~ suma = 0 ;
	//~ }
	
	
	return 0;
}


int sumar(vector<int> vec,int indice,int repeticion){
	int resultado,i;
	
	for(i=indice; i < repeticion+indice; i++){
		resultado+=vec[i];
		//cout << vec[i]<<endl;
	}
	return resultado;
}
