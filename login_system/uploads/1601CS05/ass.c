


#include <stdio.h>
#include <string.h>
#include <ctype.h>

 
struct hospital 
{
      char name[999];
      float time;
      int piro;
     
};
   
 int n;
 float t2=8.00;
 int in=0; 

 struct hospital patient[999];

 void doctor();
 int priority(char ch[999],char doc[999]);
 void sort(int index2);
 int index1=0;
 int index2=0;
 
int main() 
{
       int i,j,temp2;
       char doc[100],temp3[999];
       int p;
       float temp1;
       int k=0;
       char doc2[100];
       


    printf("\n------Enter a Data------ \n\n");
   
    printf("Enter a name of Doctor = ");
        
        scanf("%[^\n]%*c",doc);
          
    
    printf("\nEnter a number of patient = ");
    scanf("%d",&n);
     
   // struct student  patient[n];
    
    printf("\nEnter a name and time of patient\n");

    for(i=0;i<n;i++)
    {    
          printf("\nEnter  patient %d  details : \n" ,i );
          printf("Enter name : ");
          scanf("\n");
          scanf("%[^\n]%*c",patient[i].name);
          
          p=priority(patient[i].name,doc);
          patient[i].piro=p;

          printf("Enter time :  ");
          scanf("%f",&patient[i].time);
          
 
     }

        for(i=0;i<n;i++)
    {


        for(j=i+1;j<n;j++)
        {
                if(patient[i].time > patient[j].time)

                {
                    temp1=patient[i].time;
                    patient[i].time=patient[j].time;
                    patient[j].time=temp1;


                    temp2=patient[i].piro;
                    patient[i].piro=patient[j].piro;
                    patient[j].piro=temp2;


                    strcpy(temp3,patient[i].name);
                    strcpy(patient[i].name,patient[j].name);
                    strcpy(patient[j].name,temp3);

                    


                }



        }
    }


  doctor(0);
  
  printf("\nList of patient:\n");

    for(i=0;i<n;i++){
        printf("%s  ",patient[i].name);
        printf("%.2f ",patient[i].time);
        printf("%d ",patient[i].piro);
        printf("\n");
        
     }
    
    
  //  printf("%s",patient[1].name);
     
     return 0;
}




int priority(char ch[999],char doc[999])
{
    
    int count=0;
    char ch1[100];
    int p=0;
    int c=0;
    char temp;
    int i,j;

    for(i=0;i<strlen(ch);i++)
    {   
        if(ch[i]==' ')
            continue;

          else
          {

             ch1[c++] = ch[i];



          }
    
    }


     for(i=0;i<c;i++)
    {    
        for(j=i+1;j<c;j++)
        {
              if(  ch1[i] > ch1[j] )
              {       
                        temp=ch1[i];
                        ch1[i]=ch1[j];
                        ch1[j]=temp;
                               
                    
                         
              }
             

         }
    }



    char match=ch1[0];
    
    char new[100];
    
    new[0]=ch1[0];

   if(c!=0)
   count=1;   

      for(i=0;i<c;i++)
    {     
        if(match==ch1[i])
            continue;
        else
        {    

           new[count]=ch1[i];
             count++;

        
              match=ch1[i];
              
           
        }


    }

  
     
      for(i=0;i<count;i++)
         {
            for(j=0;j<strlen(doc);j++)
            {
                
                     if(new[i]==doc[j])
                      p++;

            }}

return p;

}


void doctor(int in)
{
         
     if(in<n)
     {
           if(patient[in].time<=t2 )
           {

           }
           else
           {
              
              index2=in;
             sort(index2);
             t2=t2+0.10;

           }

           
           
           in++;
           
           doctor(in);


     }

     else
          
            
        

        if( patient[--in].time < t2 )
        {
              
                index2=in+1;
             sort(index2);
             


        }

    

        else


        return;
    
   



}



void  sort(int index2)

{     
    

    int i,j,temp2;
    char temp3[999];
    float temp1;


        for(i=index1; i<index2; i++)
    {


        for(j=i+1; j<index2; j++)
        {
                if(patient[i].piro < patient[j].piro)

                {
                    temp1=patient[i].time;
                    patient[i].time=patient[j].time;
                    patient[j].time=temp1;


                    temp2=patient[i].piro;
                    patient[i].piro=patient[j].piro;
                    patient[j].piro=temp2;


                    strcpy(temp3,patient[i].name);
                    strcpy(patient[i].name,patient[j].name);
                    strcpy(patient[j].name,temp3);

                    


                }



        }
    }

    index1++;


}
