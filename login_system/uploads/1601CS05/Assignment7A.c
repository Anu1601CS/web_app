/*      
    NAME-   RAJ SHEKHAR
    ROLL-   1601CS37   
    DATE-   01/10/2017

*/
/*
    AIM-    TO MAKE A PROGRAM TO FINT I'TH ORDER STATISTICS 
*/


#include <stdio.h>
#include <stdlib.h>
#include <math.h>
#include <time.h>
#include <string.h>
#include <ctype.h>      //for tolower function
#include <stdbool.h>    //for boolean function


int cmpfunc (const void * a, const void * b) {
   return ( *(int*)a - *(int*)b );
}

void swap(int *a, int *b)
{
    int temp=*a;
    *a=*b;
    *b=temp;
}

int partition(int array[], int a, int b, int m)
{
    int i;
    for (i = a; i < b; ++i)
    {
        if (array[i]==m)
        {
            break;
        }
    }
    swap(&array[i], &array[b]);

    i =a;
    int j;
    for (j = a; j < b-1; ++j)
    {
        if (array[j]<= m)
        {
            swap(&array[i], &array[j]);
            i++;
        }
    }
    swap(&array[i], &array[b]);
    return i;
}

int store(int array[], int n)
{
    qsort(array, n, sizeof(int), cmpfunc);

    return array[n/2];
}

int work(int array[], int a, int b, int k)
{
    if (k>0 && k<= b-a+1)
    {
        int n= b-a+1;
        int mid[(n+4)/5];
        int i;

        for (i = 0; i < n/5; ++i)
         {
            mid[i]= store(array+a+i*5,5);
         }  
        if (i*5<n)
        {
            mid[i]=store(array+a+i*5, n%5);
            i++;
        }

        int midofmid;
        if (i==1)
            midofmid= mid[i-1];
        else
            midofmid=work(mid, 0, i-1, i/2);

        int p= partition(array, a, b, midofmid);

        if (p-a==k-1)
            return array[p];
        if (p-a>k-1)
            return work(array, a, p-1, k);
       
        return work(array, p+1, b, k-p+a-1);
    }

    printf("\n****wrong input*****\n");
    return 0; 
}

int main()
{
    int i, num;
    printf("\nEnter total number of elements: ");
    scanf(" %d",&num);

    printf("\nEnter the elements-\n");
    int a[num];
    for (int i = 0; i < num; ++i)
        scanf(" %d",&a[i]);

    int k;
    printf("\nEnter the ith order to be found: ");
    scanf(" %d", &k);

    printf("\nith smallest element is %d\n", work(a, 0, num-1, k));
    
}