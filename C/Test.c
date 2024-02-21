#include <stdio.h>
void ex1(){
    int num_1,num_2,num_3,somme,min;
    printf("Entrer lentie %d :",1);
    scanf("%d",&num_1);
    printf("Entrer lentie %d :",2);
    scanf("%d",&num_2);
    printf("Entrer lentie %d :",3);
    scanf("%d",&num_3);
    min = num_3;
    if(num_1 <= num_2&& num_2<=min){
       min = num_1 ;
    }
    if(num_2 <= num_3 && num_2<=min){
        min = num_2;
    }
    somme = (num_1 + num_2+ num_3)-min ;
    printf("Lasomme des plus grand Entier est : %d \n",somme);
}
void ex2(){
    int mul;
    printf("Entrer lentie pour donne la multiplication : ");
    scanf("%d",&mul);
    printf("--------------\n");
    for (int i = 1; i < 10; i++) {
        printf("| %d x %d = %d |\n",mul,i,mul*i);
    }
    printf("--------------\n");
}
void ex3(){
    int T[4];
    int somme_pairs = 0;
    for (int i = 0; i < 5; ++i) {
        printf("Entrer T[%d] : ",i);
        scanf("%d",&T[i]);
    }
    printf("--------------\n");
    for (int i = 0; i < 5; ++i) {
        if((T[i] % 2) == 0){
            somme_pairs += T[i];
        }
    }
    printf("La somme des enters pairs est  :%d \n",somme_pairs);
}
float suite(int n){
    if(n==1){
        return 1.0;
    }
    else{
        return 1.0/n + suite(n-1);
    }

}
void ex4(){

    int suite_n;
    float float_num = 0;
    printf("Entrer un entier ( pour function de suite) : ");
    scanf("%d",&suite_n);

    printf("La valeur de la suite est : %.6f \n",suite(suite_n));
}
int main() {
    printf("-------- Ex 1------\n");
    ex1();
    printf("-------------------\n\n");
    printf("-------- Ex 2------\n");
    ex2();
    printf("-------------------\n\n");
    printf("-------- Ex 3------\n");
    ex3();
    printf("-------------------\n\n");
    printf("-------- Ex 4------\n");
    ex4();
    printf("-------------------\n\n");
    return 0;
}
