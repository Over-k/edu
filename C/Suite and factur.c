#include <stdio.h>
int suite(int n){
    int s = 0;
    for (int i = 0; i <= n;i++) {
        s+= i;
    }
    return s;
}

int suite1(int n){
    if(n==1){
        return n;
    }
    else{
        n += suite1(n-1);
        return n;
    }
}
int facture(int n){
    int s = 1;
    for (int i = 1; i <= n;i++) {
        s*= i;
    }
    return s;
}
int facture1(int n){
    if(n==0){
        return 1;
    }
    else{
        n *= facture1(n-1);
        return n;
    }
}
int main() {
    int x = 5 ;
    printf("=================\n");
    printf("Suite [for]      | %d\n",suite(x));
    printf("suite [recursive]| %d\n",suite1(x));
    printf("=================\n");
    printf("Facture [for]      | %d\n",facture(x));
    printf("Facture [recursive]| %d\n", facture1(x));
    printf("=================\n");
    return 0;
}
