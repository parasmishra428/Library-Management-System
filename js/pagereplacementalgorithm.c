//program to implement following page replacement algorithm.
//FIFO
#include<stdio.h>
int main()
{
    int pn,fn,page[50],frame[10],i,j,k,count=0,avail;
    printf("Enter total page number:\n");
    scanf("%d",&pn);
    printf("\nEnter Frame size:\n");
    scanf("%d",&fn);
    printf("\nEnter page reference string:\n");
    for(i=0;i<pn;i++)
    scanf("%d",&page[i]);
    for(i=0;i<fn;i++)
        frame[i]=-1;
    j=0;
    printf("\nPage ref. \tFrame allocation\n");
    for(i=0;i<pn;i++)
    {
        printf("%d\t\t",page[i]);
        avail=0;
        for(k=0;k<fn;k++)
        {
            if(frame[k]==page[i])
                avail=1;
        }
        if(avail==0)
        {

            frame[j]=page[i];
       s
            count++;
            for(k=0;k<fn;k++)
                printf("%d\t",frame[k]);
        }
        printf("\n");
    }
    printf("\ntotal number of page fault:%d",count);
    return 0;
}

