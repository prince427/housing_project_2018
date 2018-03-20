import nltk
from nltk.corpus import PlaintextCorpusReader



files = ".*\.txt"
corpus0 = PlaintextCorpusReader(r"C:\Users\XMG\Documents\Work\Level 6 - 2017\Individual Project\Regeneration docs\Pre plan text", files)
corpus = nltk.Text(corpus0.words())



print (len(corpus))




