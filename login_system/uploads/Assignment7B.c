//Name:Anurag
//Roll no:1601CS05
//Date:25/08/17
//Program:To make a Valid Pairs According to Questions


#include<stdio.h>          //Decleration of all header files 
#include<string.h>
#include<stdlib.h>
 
struct pairs                   //Pairs Structure to store Pair of Number 
{
   int num1;
   int num2;
};

int c=0;

struct pairs number[1000];


void make_pair(int a,int b)               //Function to make Pair 
{
     number[c].num1=a;
     number[c].num2=b;
     ++c;
}


int main()                                          //Main Function
{
  
  int n,arr[1000],i,temp=0,j,m;
  printf("\nEnter a Number of Element: ");                     //Read number  of element
  scanf("%d",&n);
  printf("Enter a Array element: ");
  
  for(i=0;i<n;i++)
    scanf("%d",&arr[i]);
  printf("Enter a Value of m: ");            //Read value of m
    scanf("%d",&m);
  
  for(i=0;i<n;++i)
     {
    for(j=i+1;j<n;++j)
       {
           if (arr[i]>arr[j])
           {  
            temp= arr[i];
            arr[i] = arr[j];
            arr[j] = temp;
           }
        }
     } 
     
      i=n-1;
     
      while(i>0)
        {   
         
            if((arr[i]-arr[i-1])<=m)
            {
                make_pair(arr[i-1],arr[i]);    
                
                i=i-2;
            }  
            else
            {
             i=i-1;
            }
           
                            
        }
         
        int sum=0;

        printf("Valid pairs: ");           //print Valid Pairs

        for(i=0;i<n;i++)
        {
            for(j=i+1;j<n;j++)
            {
                   if(arr[j]-arr[i]<=m)
                   	 printf("(%d,%d) ",arr[i],arr[j]);


            }



        }

         printf("\nPairs are :");              //Print final Pairs
        
              
         for(i=c-1;i>=0;i--)
         {
               printf("(%d,%d) ",number[i].num1,number[i].num2);
               sum=sum+number[i].num1+number[i].num2;
         }  
          
          printf("\nSum = %d\n",sum);          //Print sum
               
     
 return 0;
}

