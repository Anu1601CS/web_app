#include<stdio.h>
#include<string.h>

int main()
{
   
 int arr[999],i,max;
int a,b,c;
scanf("%d %d %d",&a,&b,&c);

arr[0]=a+b*c;
arr[1]=a*(b+c);
arr[2]=a*b*c;
arr[3]=(a+b)*c;
arr[4]=a+b+c;
arr[5]=a*b+c;

max=arr[0];

for(i=1;i<5;i++)
{
     if(max<arr[i])
     {
     	max=arr[i];
     }

}


printf("%d",max);
 

}