import nltk
from nltk.corpus import PlaintextCorpusReader
from nltk.corpus import stopwords




files = ".*\.txt"
corpus0 = PlaintextCorpusReader(r"C:\Users\XMG\Documents\Work\Level 6 - 2017\Individual Project\Regeneration docs\Pre plan text",
                                files)
corpus = nltk.Text(corpus0.words())

fdistcorpus = nltk.FreqDist(corpus)


for sample in fdistcorpus:
    print(sample)



