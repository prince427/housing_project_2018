import nltk
from nltk.corpus import PlaintextCorpusReader
from nltk.corpus import stopwords



stop_words = set(stopwords.words('english'))

files = ".*\.txt"
corpus0 = PlaintextCorpusReader(r"C:\Users\XMG\Documents\Work\Level 6 - 2017\Individual Project\Regeneration docs\Pre plan text",
                                files)
corpus = nltk.Text(corpus0.words())
filtered_corpus = [w.lower() for w in corpus if not w in stop_words]
filtered_corpus2 = [word.lower() for word in filtered_corpus if word.isalpha()]
fdistcorpus = nltk.FreqDist(filtered_corpus2)





print(fdistcorpus.most_common)


