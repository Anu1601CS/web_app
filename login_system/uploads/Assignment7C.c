//Name:Anurag
//Roll no:1601CS05
//Date:25/08/17
//Program on :top down manner using recursion

#include<stdio.h>           //Decleration of header files 
#include<stdlib.h>

int count=0;
int se=0;

long long int reduce(long long int num)         //function  to reduce number and count steps
{  

  
  
   if(num==1)
   {
      printf("\n\nStep %d: N Operation\n",count);
      printf("Value = %lld",num); 
      return 0;    
   }
   if(num%2==0)
   { 
      printf("\n\nStep %d: N/2 Operation\n",count);
      printf("Value = %lld",num/2); 
      count++;
      reduce(num/2);
     
    }  
    else
   if(num%3==0)
   { 
      printf("\n\nStep %d: N/3 Operation\n",count);
      printf("Value = %lld",num/3);
         count++;
      reduce(num/3);

   } 
    else
   if(num%5==0)
    {
    
     printf("\n\nStep %d: N/5 Operation\n",count);  
     printf("Value = %lld",num/5);
         count++;
      reduce(num/5);
   
    }  
    else
    if(num%7==0)
     {
      printf("\n\nStep %d: N/7 Operation\n",count);
      printf("Value = %lld",num/7);   
          count++;
      reduce(num/7);
     
     }
      else
     { 
      printf("\n\nStep %d: N-1 Operation\n",count);
      printf("Value = %lld",num-1);
          count++;
          reduce(num-1);         
     
     }
}




int main()             //main function
{
    long long int num;
    
    printf("Enter number to reduce: ");
    scanf("%lld",&num);
    reduce(num);      
    printf("\n------------------------------\n");  
    printf("Total no. of  Steps= %d\n\n",count);

return 0;
}











